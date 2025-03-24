<div class="modal-body">
    <form method="post" id="nurseAssessmentForm">
        <div class="row">
            <div class="col">
                <label for="customerID" class="form-label">customer ID (OPD No)</label>
                <input type="text" class="form-control" id="customerID" name="customer_id">
            </div>
            <div class="col">
                <label for="visitDateTime" class="form-label">Visit Date & Time</label>
                <input type="datetime-local" class="form-control" id="visitDateTime" name="visit_date_time">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="nurseAssigned" class="form-label">Nurse Assigned</label>
                <input type="text" class="form-control" id="nurseAssigned" name="nurse_assigned">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="bloodPressure" class="form-label">Blood Pressure</label>
                <input type="text" class="form-control" id="bloodPressure" name="blood_pressure">
            </div>
            <div class="col">
                <label for="pulseRate" class="form-label">Pulse Rate</label>
                <input type="text" class="form-control" id="pulseRate" name="pulse_rate">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="respiratoryRate" class="form-label">Respiratory Rate</label>
                <input type="text" class="form-control" id="respiratoryRate" name="respiratory_rate">
            </div>
            <div class="col">
                <label for="temperature" class="form-label">Temperature</label>
                <input type="text" class="form-control" id="temperature" name="temperature">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="oxygenSaturation" class="form-label">Oxygen Saturation</label>
                <input type="text" class="form-control" id="oxygenSaturation" name="oxygen_saturation">
            </div>
            <div class="col">
                <label for="bmi" class="form-label">BMI</label>
                <input type="text" class="form-control" id="bmi" name="bmi">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="height" class="form-label">Height (cm)</label>
                <input type="number" class="form-control" id="height" name="height">
            </div>
            <div class="col">
                <label for="weight" class="form-label">Weight (kg)</label>
                <input type="number" class="form-control" id="weight" name="weight">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="bloodType" class="form-label">Blood Type</label>
                <input type="text" class="form-control" id="bloodType" name="blood_type">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="medicalHistory" class="form-label">Medical History</label>
                <textarea class="form-control" id="medicalHistory" name="medical_history" placeholder="Existing conditions, allergies, etc."></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="currentMedications" class="form-label">Current Medications</label>
                <textarea class="form-control" id="currentMedications" name="current_medications" placeholder="List of medications the customer is on"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="allergies" class="form-label">Allergies</label>
                <textarea class="form-control" id="allergies" name="allergies" placeholder="Medications, food, environmental"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="previousSurgeries" class="form-label">Previous Surgeries or Medical Procedures</label>
                <textarea class="form-control" id="previousSurgeries" name="previous_surgeries" placeholder="List of previous surgeries"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="immunizationHistory" class="form-label">Immunization History</label>
                <textarea class="form-control" id="immunizationHistory" name="immunization_history" placeholder="Vaccination history"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="painAssessment" class="form-label">Pain Assessment</label>
                <textarea class="form-control" id="painAssessment" name="pain_assessment" placeholder="Pain scale, areas of pain"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="nurseObservations" class="form-label">Nurse Observations</label>
                <textarea class="form-control" id="nurseObservations" name="nurse_observations" placeholder="Initial assessment comments"></textarea>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Assessment</button>
        </div>
    </form>
</div>

<script>
    function getPatientAssessmentModal(customer) {
        try {
            // Parse customer JSON
            customer = typeof customer === 'string' ? JSON.parse(customer) : customer;

            // Validate customer object
            if (!customer || typeof customer !== 'object') {
                console.error('Invalid customer data:', customer);
                return;
            }

            // Populate form fields
            $('#customerID').val(customer.customer_id || '');
            $('#visitDateTime').val(customer.visit_date_time || '');
            $('#nurseAssigned').val(customer.nurse_assigned || '');
            $('#bloodPressure').val(customer.blood_pressure || '');
            $('#pulseRate').val(customer.pulse_rate || '');
            $('#respiratoryRate').val(customer.respiratory_rate || '');
            $('#temperature').val(customer.temperature || '');
            $('#oxygenSaturation').val(customer.oxygen_saturation || '');
            $('#bmi').val(customer.bmi || '');
            $('#height').val(customer.height || '');
            $('#weight').val(customer.weight || '');
            $('#bloodType').val(customer.blood_type || '');
            $('#medicalHistory').val(customer.medical_history || '');
            $('#currentMedications').val(customer.current_medications || '');
            $('#allergies').val(customer.allergies || '');
            $('#previousSurgeries').val(customer.previous_surgeries || '');
            $('#immunizationHistory').val(customer.immunization_history || '');
            $('#painAssessment').val(customer.pain_assessment || '');
            $('#nurseObservations').val(customer.nurse_observations || '');

            // Update the form action
            var url = customer.id ?
                `{{ url('/nurse/assessment/update/') }}/${customer.id}` :
                '';
            $('#nurseAssessmentForm').attr('action', url);

            // Check if modal exists
            if (!$('#nurseAssessmentModal').length) {
                console.error('Modal #nurseAssessmentModal is not in the DOM');
                return;
            }

            // Show the modal
            $('#nurseAssessmentModal').modal('show');
        } catch (e) {
            console.error('Error in getcustomerAssessmentModal:', e);
        }
    }
</script>