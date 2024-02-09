
<x-app-layout :assets="$assets ?? []">
    <div>
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Appointments List</h4>
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
