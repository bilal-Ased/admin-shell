@php
$loggedInUser = auth()->user();

@endphp

<link rel="stylesheet" href="{{ mix('css/app.css') }}">


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script>
    $(function() {
        selectAssignedUser();
    });

    function selectAssignedUser(user = null) {

        if (!user) {
            user = @json($loggedInUser)
        }

        const newOption = new Option(
            user.username
            , user.id
        , )

        console.log(newOption)

        const assignedTo = $('#assignedTo')

        assignedTo.prepend(newOption).trigger('change')


        return user
    }

    function selectTicketStatus(status = null) {

        if (status) {

            const newOption = new Option(
                status.name, 
                status.id
            , )

            console.log('newOption::', newOption)

            const ticketStatus = $('#ticketStatus')

            ticketStatus.prepend(newOption).trigger('change')

        }
    }

    function initializeSelect2(selector, url, selected_val = null) {
        console.log(url)
        $(selector).select2({
            ajax: {
                url: url
                , type: 'get'
                , dataType: 'json'
                , delay: 250
                , data: function(params) {
                    return {
                        searchItem: params.term
                        , page: params.page
                    };
                }
                , processResults: function(data, params) {
                    params.page = params.page || 1;
                    var formattedData = data.data
                    return {
                        results: formattedData
                        , pagination: {
                            more: data.last_page != params.page
                        }
                    };
                }
                , cache: true
            , }
            , placeholder: 'Select an option'
            , templateResult: templateResult
            , templateSelection: templateSelection
        , });

        if (selected_val) {
            selectStatus(selected_val)
        }
    }

    function selectStatus(status) {
        console.log('select status_id', $('#ticketStatus').length)

        $('#ticketStatus').val(status).trigger('change')
    }

    function listSelect2Data(field_id, data_url, searchPlaceholder = null, dropdownParentId = null, callback = null) {

        if (dropdownParentId && $('#' + dropdownParentId).length === 0) {
            throw ('Invalid `dropdownParentId` Provided.')
        }

        $("#" + field_id).select2({
            searchInputPlaceholder: searchPlaceholder
            , placeholder: searchPlaceholder
            , allowClear: false
            , dropdownParent: $('#' + dropdownParentId)
            , ajax: {
                url: data_url
                , dataType: 'json'
                , delay: 250
                , type: "GET"
                , quietMillis: 50
                , data: function(term) {
                    if (!term.term) {
                        return {
                            term: 'data_default'
                        };
                    }
                    return {
                        term: term
                        , format: 'json'
                    };
                }
                , processResults: function(data) {
                    var results = data.data
                    setTimeout(() => {
                        if (callback) {
                            callback()
                        }
                    }, 300);
                    return {
                        results
                    }
                }
                , cache: true
            }
        });
    }



    // Global function to populate a Select2 dropdown with dynamic parameters
    function populateSelect2(elementSelector, url, params = {}) {
        let queryString = $.param(params);
        let fullUrl = queryString ? `${url}?${queryString}` : url;
        initializeSelect2(elementSelector, fullUrl);
    }

    // Function to bind the change event and populate related Select2 dropdowns
    function bindSelect2ChangeEvent(triggerElementSelector, targetElementSelector, url, paramName) {
        $(triggerElementSelector).on('change', function() {
            var paramValue = $(this).val();
            let params = {};
            params[paramName] = paramValue;
            populateSelect2(targetElementSelector, url, params);
        });
    }

    function templateResult(data) {
        if (data.loading) {
            return data.text;
        }
        return data.name;
    }

    function templateSelection(data) {
        return data.name;
    }

</script>