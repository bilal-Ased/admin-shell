<div class="modal-header">
    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <!-- Your form for editing a customer goes here -->
    <form method="post" action="{{ route('customers.update', $customer->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="customerName" class="form-label">Customer First Name</label>
                <input type="text" class="form-control" id="editCustomerName" name="customer_name"
                    value="{{ $customer->first_name }}" required>
            </div>
            <div class="col">
                <label for="customerName" class="form-label">Customer Last Name</label>
                <input type="text" class="form-control" id="editCustomerName" name="customer_name"
                    value="{{ $customer->last_name }}" required>
            </div>
        </div>



        <div class="row">
            <div class="col"><br>
                <label for="customerNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="editCustomerNumber" name="customer_phone_number"
                    value="{{ $customer->phone_number }}" required>
            </div>
            <div class="col"><br>
                <label for="customerEmail" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="editCustomerEmail" name="customer_email"
                    value="{{ $customer->email }}" required>

            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label for="alternate_number" class="form-label">Alternate Number</label>
                <input type="text" class="form-control" id="editCustomerName" name="alternate_number"
                    value="{{ $customer->alternate_number }}" required>
            </div>
            <div class="col"><br>
                <label for="date_of_birth" class="form-label">Alternate Number</label>
                <input type="date" class="form-control" id="customerInputdate" name="date_of_birth"
                    value="{{ $customer->date_of_birth }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col"><br>
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="editCustomerName" name="alternate_number"
                    value="{{ $customer->alternate_number }}" required>
            </div>

        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>