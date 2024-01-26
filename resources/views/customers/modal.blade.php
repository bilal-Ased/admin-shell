<!-- resources/views/customers/modal.blade.php -->

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
        <label for="customerName" class="form-label">Customer First Name</label>
        <input type="text" class="form-control" placeholder="First name"  id="first_name" name="first_name" required>
        </div>
        <div class="col">
        <label for="customerName" class="form-label">Customer Last Name</label>
        <input type="text" class="form-control" id="last_name"  placeholder="Last name" name="last_name" required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
        <label for="customerNumber" class="form-label">Phone Number</label>
        <input type="number" class="form-control" placeholder="Phone Number"  id="customerNumber" name="phone_number" required>
        </div>
        <div class="col"><br>
        <label for="customerEmail" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email"  placeholder="Email Address" name="email" required>
        </div>
    </div>

    <div class="row">
    <div class="col"><br>
        <label for="alternate_number" class="form-label">Alternate Number</label>
        <input type="text" class="form-control" id="alternate_number"  placeholder="Alternate Number" name="alternate_number">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Customer</button>

    </div>

</form>


