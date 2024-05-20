<form method="post" action="{{ route('brands.update', $customer->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required
                value="{{ $brand->name }}">
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

    </div>

</form>