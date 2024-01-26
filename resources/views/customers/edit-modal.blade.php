

<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form for editing a customer goes here -->
                <form method="post" action="{{ route('customers.update', $customer->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="editCustomerName" class="form-label">Customer First Name</label>
                        <input type="text" class="form-control" id="editCustomerName" name="customer_name" value="{{ $customer->first_name }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

