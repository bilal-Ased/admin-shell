<!-- resources/views/customers/modal.blade.php -->

<form action="{{ route('appointment-status.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

    </div>

</form>