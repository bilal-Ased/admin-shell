
<div class="modal-body">
    <!-- Your form for editing a customer goes here -->
    <form method="post" id="editCustomerForm">
        <div class="row">
            <div class="col">
                <label for="customerFirstName" class="form-label">Customer First Name</label>
                <input type="text" class="form-control" id="customerFirstName" name="customer_name" required>
            </div>
            <div class="col">
                <label for="customerLastName" class="form-label">Customer Last Name</label>
                <input type="text" class="form-control" id="customerLastName" name="customer_last_name" required>
            </div>
        </div>
        <div class="row">
            <div class="col"><br>
                <label for="customerPhoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="customerPhoneNumber" name="customer_phone_number" required>
            </div>
            <div class="col"><br>
                <label for="customerEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="customerEmail" name="customer_email" required>
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
                <input type="text" class="form-control" id="gender" name="gender">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<script>
    function getCustomerModal(customer) {

        customer = JSON.parse(customer)
        // Populate the form fields with customer data
        $('#customerFirstName').val(customer.first_name);
        $('#customerLastName').val(customer.last_name);
        $('#customerPhoneNumber').val(customer.phone_number);
        $('#customerEmail').val(customer.email);
        $('#alternateNumber').val(customer.alternate_number || '');
        $('#dateOfBirth').val(customer.date_of_birth || '');
        $('#gender').val(customer.gender || '');
        
        // If you want to update form action dynamically (optional)

        var url = `{{ url('/customers/update/') }}/${customer.id}`;


        $('#editCustomerForm').attr('action',);
        $('#editCustomerModal').modal('show');
    }
</script>
