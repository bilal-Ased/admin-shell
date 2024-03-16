<form action="{{ route('materials.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    </div>

    <div class="row">
        <div class="col">
            <label for="customerName" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
        </div>
        <div class="col">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description"
                required>
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="unit_price" class="form-label">Unit price</label>
            <input type="number" class="form-control" placeholder="Unit price" id="unit_price" min="0"
                step="0.01" name="unit_price">
        </div>
        <div class="col"><br>
            <label for="quantity_on_hand" class="form-label">Quantity on Hand</label>
            <input type="number" class="form-control" id="quantity_on_hand" name="quantity_on_hand">
        </div>
    </div>

    <div class="col"><br>
        <label for="reorder_level" class="form-label">Reorder level</label>
        <input type="number" class="form-control" id="reorder_level" name="reorder_level" value="0" readonly>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Material</button>

    </div>

</form>
