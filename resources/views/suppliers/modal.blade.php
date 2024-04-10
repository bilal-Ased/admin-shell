<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="customerName" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
        </div>
        <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="number" class="form-label">Phone Number</label>
            <input type="phone" class="form-control" placeholder="Phone Number" id="phone" name="phone">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Material</button>

    </div>

</form>
