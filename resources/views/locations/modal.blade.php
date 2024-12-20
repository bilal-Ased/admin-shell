<form action="{{ route('locations.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="col">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Brand Name" name="name" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
