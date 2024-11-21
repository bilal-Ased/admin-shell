<style>
    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        z-index: 99999;
        width: 100% !important;
        padding: 0;
    }

    .select2-dropdown {
        z-index: 1056;
    }

    .select2-container .select2-selection--multiple {
        min-height: 40px !important;
    }
</style>

@include('tickets.includes.ticket_scripts')

<div class="modal-body">
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="modalTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="update-info-tab" data-bs-toggle="tab" href="#update-info" role="tab"
                aria-controls="update-info" aria-selected="true">
                Update Info
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="customer-info-tab" data-bs-toggle="tab" href="#customer-info" role="tab"
                aria-controls="customer-info" aria-selected="false">
                Customer Info
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="history-info-tab" data-bs-toggle="tab" href="#history-info" role="tab"
                aria-controls="history-info" aria-selected="false">
                History Info
            </a>
        </li>
    </ul>
    <div style="height: 2px; background-color: #7DAFF1; margin-top: 10px; margin-bottom: 10px;"></div>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="modalTabsContent">
        <div class="tab-pane fade show active" id="update-info" role="tabpanel" aria-labelledby="update-info-tab">
            <form method="POST" enctype="multipart/form-data" id="patientForm">
                @csrf
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <label for="customerNumber" class="form-label">Status</label>
                            <select id="selectDoctor" class="form-select" name="insurnace_status_id">

                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">
                            <label for="teethSelect" class="form-label">Select Teeth</label>
                            <select id="teethSelect" class="form-select" style="min-width: 150px;overflow:hidden"
                                name="teeth[]" multiple>
                                <!-- Options will be populated dynamically -->
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enterToothCheckbox" />
                                <label class="form-check-label" for="enterToothCheckbox">
                                    Enter Tooth/Teeth Worked On
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"
                                placeholder="Enter Comments here"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">Upload File</label>
                            <input type="file" class="form-control" id="fileUpload" name="file_upload">
                            <small class="form-text text-muted" id="fileName">No file chosen</small>
                        </div>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>

    </div>

    <div class="tab-pane fade" id="customer-info" role="tabpanel" aria-labelledby="customer-info-tab">
        <ul class="list-group">
            <li class="list-group-item"><b>Name:</b> John Doe</li>
            <li class="list-group-item"><b>Phone Number:</b> +1234567890</li>
            <li class="list-group-item"><b>Email:</b> johndoe@example.com</li>
            <li class="list-group-item"><b>Created At:</b> 2024-11-01</li>
        </ul>
    </div>
</div>
</div>

<script>
    $(function() {
        initializeSelect2('#selectDoctor', '{{URL('settings/appointment-status/list')}}');
    });

    document.addEventListener('DOMContentLoaded', function () {
        var updateInfoTab = new bootstrap.Tab(document.getElementById('update-info-tab'));
        updateInfoTab.show();

        document.getElementById('fileUpload').addEventListener('change', function (event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
            document.getElementById('fileName').textContent = fileName;
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize select2 for selectedTeeth dropdown
        $('#selectedTeeth').select2();

        // Open modal when checkbox is clicked
        document.getElementById('enterToothCheckbox').addEventListener('change', function () {
            if (this.checked) {
                const modal = new bootstrap.Modal(document.getElementById('teethModal'));
                modal.show();
            }
        });

        // Handle saving selected teeth
        document.getElementById('saveTeeth').addEventListener('click', function () {
            const selectedTeeth = [];
            document.querySelectorAll('#teethList input:checked').forEach((checkbox) => {
                selectedTeeth.push({ id: checkbox.id, text: checkbox.value });
            });

            // Update select2 with selected teeth
            const selectTeethDropdown = $('#selectedTeeth');
            selectTeethDropdown.empty(); // Clear existing options
            selectedTeeth.forEach((tooth) => {
                const newOption = new Option(tooth.text, tooth.id, true, true);
                selectTeethDropdown.append(newOption);
            });
            selectTeethDropdown.trigger('change'); // Refresh select2

            // Close the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('teethModal'));
            modal.hide();
        });
    });

    $(document).ready(function () {
    // Initialize Select2
    $('#teethSelect').select2({
        placeholder: "Select Teeth",
        allowClear: true
    });

    // Populate options for teeth 1 to 32
    for (let i = 1; i <= 32; i++) {
        $('#teethSelect').append(new Option(`Tooth ${i}`, i));
    }
    
});

</script>