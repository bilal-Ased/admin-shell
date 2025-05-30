<x-app-layout :assets="$assets ?? []">
    <style>
        .appointments-style {
            background: #d1e3f7;
            color: #1a4d85;
            padding: 0 5px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.06em;
        }



        /* Style for even rows */
        .dataTables_wrapper tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Light gray color */
        }

        body {
            overflow: -moz-scrollbars-vertical;
            overflow-x: hidden;
            /* overflow-y: hidden; */
            height: 100%;
            margin: 0;
        }
    </style>

    <div>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">All Appointments</h4>

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





</x-app-layout>