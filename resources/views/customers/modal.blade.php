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
    <div class="mb-3"></div>

    <div class="row">
        <div class="col">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" required>
        </div>
        <div class="col">
            <label for="last_name" class="form-label">Last Name</label>
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
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
        </div>
    </div>

    <div class="row">
        <div class="col-6"><br>
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>
        <div class="col-6"><br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="bleedingCheckbox" name="bleeding">
                <label class="form-check-label" for="bleedingCheckbox">Do you have any bleeding?</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="heartDiseaseCheckbox" name="heart_disease">
                <label class="form-check-label" for="heartDiseaseCheckbox">Do you have any heart disease?</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="drugTherapyCheckbox" name="drug_therapy">
                <label class="form-check-label" for="drugTherapyCheckbox">Are you on any Drug Therapy?</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="pregnancyCheckbox" name="pregnancy">
                <label class="form-check-label" for="pregnancyCheckbox">Pregnancy?</label>
            </div>

        </div>
    </div>



    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="allergiesCheckbox">
            <label class="form-check-label" for="allergiesCheckbox">Do you have any allergies?</label>
        </div>

        <textarea class="form-control allergies-comment" id="allergiesComment" name="allergy"
            placeholder="Please list your allergies here..."></textarea>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

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