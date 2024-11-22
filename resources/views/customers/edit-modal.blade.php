<div class="modal-body">
    <form method="post" id="editCustomerForm">
        @csrf
        <input type="hidden" name="_method" value="PUT"> <!-- Simulate PUT request -->

        <div class="row">
            <div class="col">
                <label for="customerFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="customerFirstName" name="first_name" required>
            </div>
            <div class="col">
                <label for="customerLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="customerLastName" name="last_name" required>
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label for="customerPhoneNumber" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="customerPhoneNumber" name="phone_number" required>
            </div>
            <div class="col"><br>
                <label for="customerEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="customerEmail" name="email" required>
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label for="alternateNumber" class="form-label">Alternate Number</label>
                <input type="text" class="form-control" id="alternateNumber" name="alternate_number">
            </div>

            <div class="col"><br>
                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth">
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select mb-3 shadow-none" id="gender" name="gender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>

            <div class="col"><br>
                <label for="insurance" class="form-label">Insurance</label>
                <select class="form-select mb-3 shadow-none" id="insurance" name="insurance">
                    <!-- Options will be dynamically populated -->
                </select>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="allergiesCheckboxEdit">
                <label class="form-check-label" for="allergiesCheckboxEdit">Do you have any allergies?</label>
            </div>
            <textarea class="form-control allergies-commentEdit" id="allergiesCommentEdit" name="allergy"
                placeholder="Please list your allergies here..."></textarea>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>


<scrip>
    function getCustomerModal(customer) {
    customer = JSON.parse(customer);

    console.log('customer', customer);

    // Populate the form fields with customer data
    $('#customerFirstName').val(customer.first_name || '');
    $('#customerLastName').val(customer.last_name || '');
    $('#customerPhoneNumber').val(customer.phone_number || '');
    $('#customerEmail').val(customer.email || '');
    $('#alternateNumber').val(customer.alternate_number || '');

    if (customer.date_of_birth) {
    const formattedDOB = new Date(customer.date_of_birth).toISOString().split('T')[0];
    $('#dateOfBirth').val(formattedDOB);
    } else {
    $('#dateOfBirth').val('');
    }

    // Set gender
    $('#gender').val(customer.gender || '');

    // Populate insurance options dynamically
    initializeSelect2('#insurance', '{{ URL('/settings/insurance/list/search') }}', customer.insurance);

    // Set allergy fields
    const allergy = customer.customer_profile?.allergy;
    if (allergy) {
    $('#allergiesCheckboxEdit').prop('checked', true);
    $('.allergies-commentEdit').show();
    $('#allergiesCommentEdit').val(allergy);
    } else {
    $('#allergiesCheckboxEdit').prop('checked', false);
    $('.allergies-commentEdit').hide();
    }

    // Update the form action dynamically to use the correct URL for the update
    var url = `{{ url('/customers') }}/${customer.id}`; // Correct URL for the update route
    $('#editCustomerForm').attr('action', url);

    // Show the modal
    $('#editCustomerModal').modal('show');
    }

</scrip>