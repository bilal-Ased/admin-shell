<div id="editAppointmentStatusModal" class="modal fade" tabindex="-1" aria-labelledby="editAppointmentStatusLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppointmentStatusLabel">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form for editing a customer goes here -->
                <form method="post" action="{{ route('appointment-status.update', $appointmentStatus->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col">
                            <label for="appointmentStatusName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editAppointmentStatusName"
                                name="appointment_status_name" value="{{ $appointmentStatus->name }}" required>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>