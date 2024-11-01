<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div style="position: relative;">
    <label class="form-label" for="customerSearch">Customer:</label>
    <select id="customerId" name="customer_id" style="width: 100%;" onchange="selectCustomer(this)">
        <!-- Options will be dynamically populated by Select2 -->
    </select>
    <button id="newCustomerBtn" class="btn btn-primary" type="button" style="position: absolute; right: 0; top: 0;"
        data-bs-toggle="modal" data-bs-target="#addCustomerModal">
        <i class="fa-duotone fa-solid fa-user-plus fa-2xs"></i><!-- Font Awesome icon for adding -->
    </button>
</div>

<script>
    var searchedCustomers;
    
    $(document).ready(function() {
        $('#customerId').select2({
            placeholder: 'Search for a customer',
            ajax: {
                url: '{{ route("customers.search") }}',
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: '{{ csrf_token() }}',
                        searchReq: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function(data, params) {
                    params.page = params.page || 1;
                    searchedCustomers = data.results || [];
    
                    return {
                        results: data.results.map(function(customer) {
                            return {
                                id: customer.id,
                                text: `${customer.first_name} ${customer.last_name}`
                            };
                        }),
                        pagination: {
                            more: params.page < data.totalPages
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });

        // Handle the new customer form submission
        $('#newCustomerForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            $.ajax({
                url: '/customers', // Your endpoint for creating a new customer
                type: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    // Assuming your response includes the new customer
                    $('#newCustomerModal').modal('hide'); // Hide the modal
                    $('#customerId').append(new Option(`${response.first_name} ${response.last_name} (${response.phone_number})`, response.id, true, true)).trigger('change'); // Add new customer to select
                    $('#customerId').val(response.id).trigger('change'); // Select the new customer
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Error creating customer:', error);
                }
            });
        });
    });

    function selectCustomer(e) {
        const customerId = $(e).val();
        const customer = searchedCustomers.find(customer => String(customer.id) === customerId);
        customer && renderCustomerBio(customer);
    }
</script>