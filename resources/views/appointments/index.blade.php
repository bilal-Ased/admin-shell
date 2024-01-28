<x-app-layout :assets="$assets ?? []">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
                            <input type="datetime-local" class="form-control" id="appointment_datetime" name="appointment_datetime">
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



                        <button type="submit" class="btn btn-primary">Create Appointment</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.noConflict(); // Use noConflict to avoid conflicts with other libraries

        jQuery(document).ready(function($) {
            // Function to update the result count
            function updateResultCount(count, term) {
                var message = (count > 0) ? 'Showing results ' + ((term) ? 'for \'' + term + '\' ' : '') + 'out of ' + count + ' results' : 'No results found ' + ((term) ? 'for \'' + term + '\'' : '');
                $('#result-count').text(message);
            }

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
                        // Update the result count
                        var term = $('#customer').val();
                        var count = data.length;
                        updateResultCount(count, term);

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
        });
    </script>

    </x-app-layout>
