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

        .select2-container {
            z-index: 1000 !important;
        }
    </style>
    <div>
        @include('tickets.includes.ticket_scripts')

        <div class="row">
            <div class="col-sm-12 col-lg-5">
                @include('appointments.customer-bio')
            </div>
            <div class="col-sm-12 col-lg-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Create Appointment</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="AppointmentForm" action="{{ route('appointment.store') }}" method="POST">
                            <div class="form-group">
                                @include('customers.customer-search')
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="d-flex align-items-center gap-1"><span>Select Doctor</span> <small
                                                class="text-danger">*</small></label>
                                        <select id="selectDoctor" class="form-select" name="user_id">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputdate">Select Date</label>
                                        <input type="date" class="form-control" id="exampleInputdate"
                                            name="appointment_date">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputtime">Select Time</label>
                                        <input type="time" class="form-control" id="exampleInputtime"
                                            name="appointment_time">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="send_email" value="1"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Send Customer Email Notification
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <!-- Modal -->
    <!-- Your index file -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('customers.modal')
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {            
            initializeSelect2('#selectDoctor', '{{URL('settings/all-doctors')}}');

        });

    </script>

</x-app-layout>