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
            <select class="form-select mb-3 shadow-none" name="gender">
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>

        <div class="col"><br>
            <label for="insurance" class="form-label">Insurance</label>
            <select class="form-select mb-3 shadow-none" name="insurance" id="insurance"></select>
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