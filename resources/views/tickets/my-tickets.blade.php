<x-app-layout :assets="$assets ?? []">

    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">My Tickets</h4>
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
    <!-- Ensure DataTables scripts and styles are included -->
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                $('#tickets-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                });
            }, 3000);
        });
    </script>
    @endpush
</x-app-layout>