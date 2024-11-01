<!-- resources/views/customers/modal.blade.php -->
<style>
    /* Basic styling for the Select2 container */
    .select2-container--default .select2-selection--single {
        background-color: #f8f9fa !important;
        /* Light background color */
        border: 1px solid #ced4da !important;
        /* Border color matching form elements */
        border-radius: 4px !important;
        /* Rounded corners */
        height: 38px !important;
        /* Match the height of your form elements */
    }

    /* Style for the dropdown arrow */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 34px !important;
        /* Align with the container height */
        top: 2px !important;
        /* Align with the text */
    }

    /* Focus styling */
    .select2-container--default .select2-selection--single:focus-within {
        border-color: #80bdff !important;
        /* Border color on focus */
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25) !important;
        /* Subtle shadow on focus */
    }

    /* Style for the dropdown items */
    .select2-container--default .select2-results__option {
        padding: 8px 12px !important;
        /* Spacing for dropdown options */
        font-size: 14px !important;
        /* Font size to match form inputs */
    }

    /* Hover effect for dropdown items */
    .select2-container--default .select2-results__option--highlighted {
        background-color: #007bff !important;
        /* Highlight background color */
        color: #ffffff !important;
        /* Highlight text color */
    }

    /* Style for the placeholder text */
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6c757d !important;
        /* Placeholder text color */
        font-size: 14px !important;
        /* Font size to match form inputs */
    }
</style>
<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="customerName" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" required>
        </div>
        <div class="col">
            <label for="customerName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name" required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="customerNumber" class="form-label">Phone Number</label>
            <input type="number" class="form-control" placeholder="Phone Number" id="customerNumber" name="phone_number"
                required>
        </div>
        <div class="col"><br>
            <label for="customerEmail" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="alternate_number" class="form-label">Alternate Number</label>
            <input type="text" class="form-control" id="alternate_number" placeholder="Alternate Number"
                name="alternate_number">
        </div>

        <div class="col"><br>
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="customerInputdate" name="date_of_birth">
        </div>

    </div>

    <div class="row">
        <div class="col"><br>
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select mb-3 shadow-none" class="gender" name="gender">
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

    </div>

</form>


<script>
    $(function() {
            
            initializeSelect2('#companies_list', '{{URL('/companies/list')}}');

        });
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