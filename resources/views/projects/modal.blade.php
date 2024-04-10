<!-- Add the CDN link for Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="mb-3"></div>

    <div class="row">
        <div class="col">
            <label for="projectName" class="form-label">Name</label>
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
            <label for="budget" class="form-label">Budget</label>
            <input type="number" class="form-control" placeholder="Budget" id="budget" min="0" step="0.01"
                name="budget">
        </div>
        <div class="col"><br>
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
        <div class="col"><br>
            <label for="endDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="customer">Customer:</label>
        <select id="customer" class="form-control" name="customer" style="width: 100%;">
            <option value="" disabled selected>Select a customer</option>
        </select>
        <input type="hidden" id="customerId" name="customer_id">
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="material">Material</label>
            <br>
            <select name="material_id[]" id="material" class="form-control" multiple style="width: 100%;">
                <!-- Remove the placeholder option from here -->
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Project</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
        // Select2 for selecting customers
        $('#customer').select2({
            ajax: {
                url: '/search/customers',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term,
                    };
                },
                processResults: function(data) {
                    var term = $('#customer').val();
                    var count = data.length;

                    return {
                        results: data
                    };
                },
                cache: true
            },
            placeholder: 'Search for a customer',
            minimumInputLength: 3,
            language: {
                searching: function(params) {
                    return 'Searching...';
                },
                inputTooShort: function() {
                    return 'Please enter at least 3 characters';
                }
            },
            escapeMarkup: function(markup) {
                return markup;
            },
            templateResult: function(data) {
                return data.text;
            },
            templateSelection: function(data) {
                return data.text;
            },
            dropdownParent: $('#customer').parent() // Ensure dropdown appears above modal
        }).on('select2:open', function() {
            $('.select2-dropdown').append('<div class="select2-result-count" id="result-count"></div>');
        }).on('select2:select', function(e) {
            var data = e.params.data;
            $('#customerId').val(data.id);
        });

        // Select2 for selecting materials
        $('#material').select2({
            ajax: {
                url: '{{ route('materials.search') }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(material) {
                            return {
                                id: material.id,
                                text: material.name
                            };
                        })
                    };
                },
                cache: true
            },
            placeholder: 'Select Material', // Change placeholder text here
            minimumInputLength: 3,
            dropdownParent: $('#material').parent(), // Ensure dropdown appears above modal
            dropdownPosition: 'below' // Force dropdown to appear below the select box
        }).on('change', function(e) {
            var selectedMaterials = $(this).val();
            var totalBudget = 0;
            if (selectedMaterials) {
                selectedMaterials.forEach(function(materialId) {
                    var material = $(`#material option[value='${materialId}']`).text();
                    // You need to replace 'materialPrice' and 'materialQuantity' with your actual logic
                    var materialPrice = 100; // Replace with your logic to get material price
                    var materialQuantity =
                        1; // Replace with your logic to get material quantity
                    totalBudget += (materialPrice * materialQuantity);
                });
            }
            $('#budget').val(totalBudget.toFixed(2));
        });
    });
</script>
