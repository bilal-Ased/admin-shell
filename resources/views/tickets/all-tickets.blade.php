<x-app-layout :assets="$assets ?? []">
    <style>
        .ticket-style {
            background: #d1e3f7;
            color: #1a4d85;
            padding: 0 5px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.06em;
        }

        .ticket-style-source {
            display: flex;
            gap: 0.4rem;
            align-items: center;

        }
    </style>
    <div>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
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