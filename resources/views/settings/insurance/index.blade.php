<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Insurnace List</h4>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addInsurnaceModal">
                                Add Insurnace
                            </button>

                            <!-- Modal -->
                            <!-- Your index file -->
                            <div class="modal fade" id="addInsurnaceModal" tabindex="-1"
                                aria-labelledby="addInsurnaceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addInsurnaceModalLabel">Add Insurnace</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @include('settings.insurance.add-modal')
                                        </div>
                                    </div>
                                </div>
                            </div>


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

        function getInsurnaceStatusModal(url) {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        // Successful response
                        var modal = document.getElementById('editInsurnaceStatusModal');

                        // Assuming the modal content is supposed to be inserted into a specific element inside the modal.
                        var modalContentElement = modal.querySelector('.modal-content');

                        // Set the content of the modal
                        modalContentElement.innerHTML = xhr.responseText;

                        // Show the modal (assuming it's a Bootstrap modal)
                        $(modal).modal('show');
                    } else {
                        // Error handling
                        console.error("Error: " + xhr.status);
                    }
                }
            };

            xhr.open("GET", url, true);
            xhr.send();
        }
    </script>

</x-app-layout>