<div>
    <!-- Including FontAwesome and Bootstrap for icons and styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <!-- Tabs navigation -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="issue-sources-tab" data-bs-toggle="tab"
                                data-bs-target="#issue-sources" type="button" role="tab" aria-controls="issue-sources"
                                aria-selected="true">Issue Sources</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="issue-categories-tab" data-bs-toggle="tab"
                                data-bs-target="#issue-categories" type="button" role="tab"
                                aria-controls="issue-categories" aria-selected="false">Issue Categories</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dispositions-tab" data-bs-toggle="tab"
                                data-bs-target="#dispositions" type="button" role="tab" aria-controls="dispositions"
                                aria-selected="false">Dispositions</button>
                        </li>
                        <!-- Add more tabs as needed -->
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <!-- Issue Sources Tab Content -->
                        <div class="tab-pane fade show active" id="issue-sources" role="tabpanel"
                            aria-labelledby="issue-sources-tab">
                            <h4 class="card-title">Issue Sources</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTicket">
                                Add Issue Source
                            </button>
                            <div class="mt-3">
                                <!-- Issue Sources DataTable -->
                                {{ $dataTable->table() }}
                            </div>
                        </div>

                        <!-- Issue Categories Tab Content -->
                        <div class="tab-pane fade" id="issue-categories" role="tabpanel"
                            aria-labelledby="issue-categories-tab">
                            <h4 class="card-title">Issue Categories</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addCategory">
                                Add Category
                            </button>
                            <div class="mt-3">
                                <!-- Issue Categories DataTable (or other content) -->
                                <!-- You can replicate the DataTable code for each tab if needed -->
                            </div>
                        </div>

                        <!-- Dispositions Tab Content -->
                        <div class="tab-pane fade" id="dispositions" role="tabpanel" aria-labelledby="dispositions-tab">
                            <h4 class="card-title">Dispositions</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addDisposition">
                                Add Disposition
                            </button>
                            <div class="mt-3">
                                <!-- Dispositions DataTable (or other content) -->
                            </div>
                        </div>

                        <!-- Additional tabs as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Push necessary scripts -->
@push('scripts')
<!-- Ensure DataTables scripts and styles are included -->
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                // Initialize DataTables after DOM is loaded
                $('#tickets-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel', 'pdf', 'print'],
                    pageLength: 10, // Pagination settings
                });
            }, 3000);
        });
</script>
@endpush