<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">All Tickets</h4>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTicket">
                                Add Ticket
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            setTimeout(() => {

                // document.querySelectorAll('.list-customer-action .list-customer-btn').forEach(element => {
                //     element.addEventListener('click', function() {
                //         getCustomerModal(element.getAttribute('data-href'));
                //     });
                // });

            }, 3000);
        });

        
    </script>

</x-app-layout>