<!-- Add the CDN link for Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

<form action="{{ route('materials.store') }}" method="POST">
    @csrf
    <div class="mb-3"></div>

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
            <input type="number" class="form-control" id="quantity_on_hand" name="quantity_on_hand"
                placeholder="Quantity on Hand">
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="supplier">Supplier</label>
            <br>
            <select name="supplier_id" id="supplier">
                <option value="">Select Supplier</option>
            </select>
        </div>

        <div class="col"><br>
            <label for="serial_number" class="form-label">Serial Number</label>
            <input type="text" class="form-control" id="serial_number" name="serial_number"
                placeholder="Serial Number">
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Material</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
        $('#supplier').select2({
            ajax: {
                url: '{{ route('suppliers.search') }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(supplier) {
                            return {
                                id: supplier.id,
                                text: supplier.name
                            };
                        })
                    };
                },
                cache: true
            },
            placeholder: 'Search for a supplier',
            minimumInputLength: 3,
            dropdownParent: $('#supplier').parent() // Ensure dropdown appears above modal
        });
    });
</script>
