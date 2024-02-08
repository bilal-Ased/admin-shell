<x-app-layout :assets="$assets ?? []">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Include Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Appointment</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="customer">Customer:</label>
                            <select id="customer" class="form-control" name="customer" style="width: 100%;">
                                <option value="" disabled selected>Select a customer</option>
                            </select>
                            <input type="hidden" id="customerId" name="customer_id">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="appointment_datetime">Date Time:</label>
                            <input type="datetime-local" class="form-control" id="appointment_datetime"
                                name="appointment_datetime">
                            <span id="availability-message" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="reason">Reason:</label>
                            <input type="text" class="form-control" id="reason" name="reason">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="doctor">Doctor:</label>
                            <select id="user_id" class="form-control" name="user_id" style="width: 100%;">
                                <option value="" disabled selected>Select a doctor</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit-btn">Create Appointment</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <img src="{{ asset('images/brands/appointment.jpg') }}" alt="Example Image">

            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            // Elements
            var availabilityMessage = $('#availability-message');
            var submitButton = $('#submit-btn');

            // Live validation for appointment availability
            function checkAvailability() {
                var doctorId = $('#user_id').val();
                var appointmentDatetime = $('#appointment_datetime').val();

                if (doctorId) { // Only check if a doctor is selected
                    axios.post('/appointments/check-availability', {
                            user_id: doctorId,
                            appointment_datetime: appointmentDatetime
                        })
                        .then(function(response) {
                            var message = 'The selected doctor is ' + (response.data.isAvailable ? 'available' :
                                'not available') + ' at the specified time.';
                            availabilityMessage.text(message).show(); // Show the message
                            submitButton.prop('disabled', !response.data.isAvailable);
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                } else {
                    availabilityMessage.hide(); // Hide the message if no doctor is selected
                }
            }

            // Attach change event listeners
            $('#user_id, #appointment_datetime').on('change', function() {
                availabilityMessage.text(''); // Clear the message
                submitButton.prop('disabled', false); // Enable the submit button
                checkAvailability();
            });

            // Customer search
            $('#customer').select2({
                ajax: {
                    url: '/search/customers',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                        };
                    },
                    processResults: function(data) {
                        var term = $('#customer').val();
                        var count = data.length;

                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for a customer',
                minimumInputLength: 3,
                language: {
                    searching: function(params) {
                        return 'Searching...';
                    },
                    inputTooShort: function() {
                        return 'Please enter at least 3 characters';
                    }
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: function(data) {
                    return data.text;
                },
                templateSelection: function(data) {
                    return data.text;
                }
            }).on('select2:open', function() {
                $('.select2-dropdown').append('<div class="select2-result-count" id="result-count"></div>');
            }).on('select2:select', function(e) {
                var data = e.params.data;
                $('#customerId').val(data.id);
            });

            // Doctor search
            $('#user_id').select2({
                ajax: {
                    url: '/search/doctors',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for a doctor',
                minimumInputLength: 3
            });

            // Initial hide of the message
            availabilityMessage.hide();

            // Initial check on page load
            checkAvailability();
        });
    </script>

</x-app-layout>
