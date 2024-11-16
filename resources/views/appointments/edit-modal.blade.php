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
            <a class="nav-link" id="customer-info-tab" data-bs-toggle="tab" href="#customer-info" role="tab"
                aria-controls="customer-info" aria-selected="false">
                History Info
            </a>
        </li>
    </ul>
    <div style="height: 2px; background-color: #7DAFF1; margin-top: 10px; margin-bottom: 10px;"></div>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="modalTabsContent">
        <div class="tab-pane fade show active" id="update-info" role="tabpanel" aria-labelledby="update-info-tab">
            <form method="post" id="patientForm">
                <div class="col">

                    <div class="row">
                        <div class="col">
                            <label for="customerNumber" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">

                            </select>
                        </div>
                        <div class="col">
                            <label for="toothWorkedOn" class="form-label">Tooth/Teeth Worked On</label>
                            <select class="form-select" id="toothWorkedOn" name="tooth_worked_on">

                            </select>
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

<!-- Script to Handle Modal Behavior -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var updateInfoTab = new bootstrap.Tab(document.getElementById('update-info-tab'));
        updateInfoTab.show();

        document.getElementById('fileUpload').addEventListener('change', function (event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
            document.getElementById('fileName').textContent = fileName;
        });
    });

    
</script>