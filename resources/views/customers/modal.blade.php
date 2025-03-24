<style>
    /* Increase the modal width */
    .modal-dialog {
        max-width: 800px;
        /* Adjust this value as needed */
    }


    /* Additional styling for the allergies section */
    .allergies-comment {
        display: none;
        /* Initially hide the comment box */
    }

    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        z-index: 99999;
        width: 100% !important;
        padding: 0;
    }

    select2-dropdown {
        z-index: 1056;
        /* Dropdown above the modal content */
    }
</style>

@include('tickets.includes.ticket_scripts')

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="modal-body">
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="personal-contact-tab" data-toggle="tab" href="#personal-contact"
                    role="tab" aria-controls="personal-contact" aria-selected="true">Personal & Contact Info</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="additional-tab" data-toggle="tab" href="#additional" role="tab"
                    aria-controls="additional" aria-selected="false">Additional Info</a>
            </li>
        </ul>

        <!-- Add a stylish line below the tabs -->
        <hr class="my-4" style="border-top: 2px solid #ddd;">

        <!-- Tab Contents -->
        <div class="tab-content" id="myTabContent">
            <!-- Personal & Contact Info Tab -->
            <div class="tab-pane fade show active" id="personal-contact" role="tabpanel"
                aria-labelledby="personal-contact-tab">
                <div class="row">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="First name" id="first_name"
                            name="first_name" required>
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col"><br>
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="col"><br>
                        <label for="marital_status" class="form-label">Marital Status</label>
                        <input type="text" class="form-control" id="marital_status" placeholder="Marital Status"
                            name="marital_status">
                    </div>
                </div>

                <div class="row">
                    <div class="col"><br>
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" placeholder="Phone Number" id="phone_number"
                            name="phone_number" required>
                    </div>
                    <div class="col"><br>
                        <label for="alternate_phone_number" class="form-label">Alternate Phone Number</label>
                        <input type="number" class="form-control" placeholder="Alternate Phone Number"
                            id="alternate_phone_number" name="alternate_phone_number">
                    </div>
                </div>

                <div class="row">
                    <div class="col"><br>
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
                    </div>
                    <div class="col-6"><br>
                        <label for="referral_source" class="form-label">Referral Source</label>
                        <input type="text" class="form-control" id="referral_source" name="referral_source">
                    </div>
                </div>
            </div>

            <!-- Additional Info Tab -->
            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                <div class="row">
                    <div class="col"><br>
                        <label for="insurance_provider" class="form-label">Insurance Provider</label>
                        <input type="text" class="form-control" id="insurance_provider" placeholder="Insurance Provider"
                            name="insurance_provider">
                    </div>
                    <div class="col"><br>
                        <label for="insurance_policy_number" class="form-label">Insurance Policy Number</label>
                        <input type="text" class="form-control" id="insurance_policy_number" placeholder="Policy Number"
                            name="insurance_policy_number">
                    </div>
                </div>

                <div class="row">
                    <div class="col"><br>
                        <label for="primary_care_physician" class="form-label">Primary Care Physician</label>
                        <input type="text" class="form-control" id="primary_care_physician" placeholder="Physician Name"
                            name="primary_care_physician">
                    </div>
                    <div class="col"><br>
                        <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
                        <input type="text" class="form-control" id="emergency_contact_name"
                            placeholder="Emergency Contact" name="emergency_contact_name">
                    </div>
                </div>

                <div class="row">
                    <div class="col"><br>
                        <label for="emergency_contact_relation" class="form-label">Emergency Contact Relation</label>
                        <input type="text" class="form-control" id="emergency_contact_relation" placeholder="Relation"
                            name="emergency_contact_relation">
                    </div>
                    <div class="col"><br>
                        <label for="emergency_contact_phone" class="form-label">Emergency Contact Phone</label>
                        <input type="number" class="form-control" id="emergency_contact_phone"
                            placeholder="Emergency Phone" name="emergency_contact_phone">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add a line below the content -->

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<!-- Bootstrap 4 JS (Make sure you include this for tabs to work) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<script>
    $(function() {
        initializeSelect2('#insurance', '{{ URL('/settings/insurance/list/search') }}');

        // Toggle the visibility of the allergies comment box based on the checkbox
        $('#allergiesCheckbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('.allergies-comment').show();
            } else {
                $('.allergies-comment').hide();
                $('#allergiesComment').val(''); // Clear the textarea when unchecked
            }
        });
    });
</script>