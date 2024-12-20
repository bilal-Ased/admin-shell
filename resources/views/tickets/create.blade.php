<x-app-layout :assets="$assets ?? []">
    <style>
        .form-group {
            position: relative;
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
        }


        /* Specific styles for the search input field */
        #customerSearch {
            border-radius: 24px;
            /* Rounded corners */
            padding: 10px 20px;
            font-size: 16px;
            border: 1px solid #dcdcdc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            /* Full width */
        }

        #customerSearch:focus {
            border-color: #4285f4;
            /* Google blue color on focus */
            outline: none;
            /* Remove default outline */
            box-shadow: 0 0 5px rgba(66, 133, 244, 0.2);
            /* Blue shadow on focus */
        }

        /* Styles for the suggestions container */
        #searchSuggestions {
            position: absolute;
            top: 100%;
            /* Position below the input field */
            left: 0;
            right: 0;
            border-radius: 24px;
            /* Match input field border-radius */
            border: 1px solid #dcdcdc;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            /* Ensure it appears above other content */
            max-height: 300px;
            /* Limit height of the dropdown */
            overflow-y: auto;
            /* Scrollbar if content overflows */
            display: none;
            /* Hide initially */
        }

        /* Styles for individual suggestion items */
        .search-suggestions-container .suggestion-item {
            padding: 12px 20px;
            cursor: pointer;
            border-bottom: 1px solid #f1f1f1;
            transition: background-color 0.2s ease;
        }

        .search-suggestions-container .suggestion-item:hover {
            background-color: #f1f1f1;
            /* Light gray background on hover */
        }

        /* Pagination styles */
        .search-suggestions-container .pagination {
            padding: 10px;
            text-align: center;
        }

        .search-suggestions-container .page-link {
            cursor: pointer;
            color: #4285f4;
            /* Google blue color */
            margin: 0 5px;
            font-size: 14px;
            text-decoration: underline;
        }

        .search-suggestions-container .page-link:hover {
            text-decoration: none;
        }

        /* Container for suggestions */
        .suggestions-container {
            position: absolute;
            /* Position relative to the nearest positioned ancestor */
            background: white;
            border: 1px solid #ddd;
            z-index: 1000;
            /* Ensure it appears above other content */
            display: none;
            /* Initially hidden */
            max-height: 200px;
            /* Limit height with scroll */
            overflow-y: auto;
            width: calc(100% - 2px);
            /* Match input width, accounting for border */
        }

        /* Suggestion item styling */
        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }

        /* Highlight suggestion on hover */
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }


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
    <div>
        @include('tickets.includes.ticket_scripts')

        <div class="row">
            <div class="col-sm-12 col-lg-5">
                @include('tickets.customer-bio')
            </div>
            <div class="col-sm-12 col-lg-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Create Ticket</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="ticketForm" action="{{ route('tickets.store') }}" method="POST">
                            <div class="form-group">
                                <label class="form-label" for="customer">Customer:</label>
                                <input type="text" class="form-control form-control-sm" id="customerSearch"
                                    placeholder="Search customers" value="{{$customer->first_name ?? ''}}"
                                    oninput="debounce('customerSearch', this)">
                                <input type="hidden" class="id" id="customerId" name="customer_id"
                                    value="{{$customer->id ?? ''}}">
                                <div id="searchSuggestions" class="suggestions-container"></div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-0">
                                            <label class="d-flex align-items-center gap-1"><span>Issue Source </span>
                                                <small class="text-danger">*</small></label>
                                            <select id="ticketSources" class="form-select" name="issue_source_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-0">
                                            <label class="d-flex align-items-center gap-1"><span>Issue Category </span>
                                                <small class="text-danger">*</small></label>
                                            <select id="ticketCategory" class="form-control" name="issue_category_id">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="d-flex align-items-center gap-1"><span>Disposition </span> <small
                                                class="text-danger">*</small></label>
                                        <select id="ticketDisposition" class="form-control"
                                            name="disposition_id"></select>
                                    </div>
                                    <div class="col">
                                        <label>Department</label>
                                        <select id="department" class="form-select" name="department_id"></select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                @include('tickets.includes.assigned_and_status')
                            </div>
                            <div class="form-group">
                                <label for="customFile" class="form-label custom-file-input">Attach File</label>
                                <input class="form-control" type="file" id="customFile" name="file_path">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

    <script>
        let currentPage = 1;
        const resultsPerPage = 10;

        function customerSearch(e) {

            let searchReq = $(e).val();

            if (searchReq.length > 0) {
                $.ajax({
                    method: 'POST'
                    , url: '{{ route("customers.search") }}'
                    , dataType: 'json'
                    , data: {
                        '_token': '{{ csrf_token() }}'
                        , searchReq: searchReq
                        , page: currentPage
                        , perPage: resultsPerPage
                    }
                    , success: function(res) {
                        if (res && res.results) {
                            displaySuggestions(res);
                        } else {
                            $('#searchSuggestions').hide();
                        }
                    }
                    , error: function() {
                        $('#searchSuggestions').hide();
                    }
                });
            } else {
                $('#searchSuggestions').hide();
            }
        };

        $(
        ()=>{
            $('#customerSearch').on('keydown', 
                (e)=>{

                    if(e.key === 'Enter'){

                        e.preventDefault()
                    }
                }
            )
        }

        )

        var searchCustomers = []
        function displaySuggestions(data) {
            let suggestionsContainer = $('#searchSuggestions');
            suggestionsContainer.empty();

            if (data.results.length > 0) {
                searchCustomers = data.results
                data.results.forEach(item => {
                    suggestionsContainer.append(`
                <div class="suggestion-item" data-id="${item.id}">
                    ${item.first_name} ${item.last_name}
                </div>
            `);
                });

                suggestionsContainer.show();
            } else {
                suggestionsContainer.hide();
            }
        }

        $('body').on('click', '.suggestion-item', function() {
            console.log('load customer....')

            let selectedText = $(this).text();
            let customerId = $(this).data('id'); // Get the customer ID from the data attribute
            $('#customerSearch').val(selectedText);
            $('#customerId').val(customerId); // Set the hidden input with the customer ID
            $('#searchSuggestions').hide(); // Hide suggestions after selection
            const customer = searchCustomers.find((customer) => customer.id == customerId)
        
        if (customer) {
            renderCustomerBio(customer)
        }
    });

        // Handle pagination clicks
        $('body').on('click', '.page-link', function() {
            currentPage = $(this).data('page');
            $('#customerSearch').trigger('keyup'); // Trigger search with new page
        });

        // Hide suggestions if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('#customerSearch, #searchSuggestions').length) {
                $('#searchSuggestions').hide();
            }
        });


        $(function() {
            
            initializeSelect2('#ticketCategory', '{{URL('/settings/tickets/categories ')}}');
            initializeSelect2('#ticketSources', '{{URL('/settings/tickets/sources ')}}');

            // Generic change event binding for populating related Select2 elements
            bindSelect2ChangeEvent('#ticketCategory', '#ticketDisposition', '{{URL('/settings/tickets/disposition')}}', 'issue_category_id');
            bindSelect2ChangeEvent('#ticketDisposition', '#department', '{{URL('/settings/tickets/department')}}', 'disposition_id');

        });

    </script>

</x-app-layout>