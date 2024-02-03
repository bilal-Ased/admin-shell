<!-- resources/views/customers/modal.blade.php -->

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="customerName" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" required>
        </div>
        <div class="col">
            <label for="customerName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name" required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="customerNumber" class="form-label">Phone Number</label>
            <input type="number" class="form-control" placeholder="Phone Number" id="customerNumber"
                name="phone_number" required>
        </div>
        <div class="col"><br>
            <label for="customerEmail" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email"
                required>
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
            <input type="date" class="form-control" id="" placeholder="date_of_birth" name="date_of_birth">
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select form-select-sm " aria-label=".form-select-sm" id="gender" name="gender">
                <option selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Customer</button>

    </div>

</form>
