<style>
    .select2-dropdown {
        z-index: 1060 !important;
        /* Adjust the z-index value as needed */

    }

    .select2er .selection {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #8A92A6;
        background-color: #ffffff;
        background-clip: padding-box;
        border: 1px solid #eee;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.25rem;
        box-shadow: 0 0 0 0;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
</style>

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
            <label for="brand">Brand</label>
            <br>
            <select name="brand_id" id="brand_id" class="brand  form-control" style="width:250px;">
                <option value="">Select Brand</option>
            </select>
        </div>
        <div class="col"><br>
            <label for="quantity_on_hand" class="form-label">Quantity on Hand</label>
            <input type="number" class="form-control" id="quantity_on_hand" name="quantity_on_hand"
                placeholder="Quantity on Hand">
        </div>
    </div>

    <div class="row">
        <div class="col"><br>
            <label for="location">Location</label>
            <br>
            <select name="location_id" id="location_id" class="location form-control" style="width:250px;">
                <option value="">Select location</option>
            </select>
        </div>

        <div class="col"><br>
            <label for="serial" class="form-label">Serial Number</label>
            <input type="text" class="form-control" id="serial_number" name="serial_number"
                placeholder="Serial Number">
        </div>

        <div class="col"><br>
            <label for="account">Account</label>
            <br>
            <select name="account_id" id="account_id" class="account form-control" style="width:250px;">
                <option value="">Select account</option>
            </select>
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Material</button>
    </div>
</form>




<script>
    $(document).ready(function() {
        dropdown('/all/brands', 'brand', 'addMaterialModal', 'Select a brand');
        dropdown('/all/locations', 'location', 'addMaterialModal', 'Select a location');
        dropdown('/all/accounts', 'account', 'addMaterialModal', 'Select an Account');

    });
</script>
