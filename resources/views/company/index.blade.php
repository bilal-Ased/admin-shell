<x-app-layout :assets="$assets ?? []">
    <!-- Include jQuery -->

    <!-- Include Select2 JS -->

    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Companies List</h4>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addCompany">
                                Add Company
                            </button>

                            <!-- Modal -->
                            <!-- Your index file -->
                            <div class="modal fade" id="addCompany" tabindex="-1"
                                aria-labelledby="addCompanyModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCompanyModalLabel">Add Company</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @include('company.modal')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </di v>
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



</x-app-layout>
