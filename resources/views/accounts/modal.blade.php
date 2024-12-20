<!-- resources/views/customers/modal.blade.php -->

<form action="{{ route('accounts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="name" class="form-label">Account Name</label>
            <input type="text" class="form-control" placeholder="Account Name" id="name" name="name" required>
        </div>
        <div class="col">
            <label for="number_of_agents" class="form-label">Number of Agents</label>
            <input type="number" class="form-control" id="number_of_agents" placeholder="Number of Agents"
                name="number_of_agents" required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" placeholder="Start Date" id="start_date" name="start_date"
                required>
        </div>
        <div class="col"><br>
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" placeholder="End Date" name="end_date">
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Account</button>

    </div>

</form>
