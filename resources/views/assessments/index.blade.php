<x-app-layout :assets="$assets ?? []">
    <style>
        .form-group {
            position: relative;
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
        }

        /* Basic styling for the Select2 container */
        .select2-container--default .select2-selection--single {
            background-color: #f8f9fa !important;
            /* Light background color */
            border: 1px solid #ced4da !important;
            /* Border color matching form elements */
            border-radius: 4px !important;
            /* Rounded corners */
            height: 38px !important;
            /* Match the height of your form elements */
        }

        /* Style for the dropdown arrow */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 34px !important;
            /* Align with the container height */
            top: 2px !important;
            /* Align with the text */
        }

        /* Focus styling */
        .select2-container--default .select2-selection--single:focus-within {
            border-color: #80bdff !important;
            /* Border color on focus */
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25) !important;
            /* Subtle shadow on focus */

        }

        /* Style for the dropdown items */
        .select2-container--default .select2-results__option {
            padding: 8px 12px !important;
            /* Spacing for dropdown options */
            font-size: 14px !important;
            /* Font size to match form inputs */
        }

        /* Hover effect for dropdown items */
        .select2-container--default .select2-results__option--highlighted {
            background-color: #007bff !important;
            /* Highlight background color */
            color: #ffffff !important;
            /* Highlight text color */
        }

        /* Style for the placeholder text */
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #6c757d !important;
            /* Placeholder text color */
            font-size: 14px !important;
            /* Font size to match form inputs */
        }

        .select2-container {
            z-index: 1000 !important;
        }
    </style>
    <div>
        @include('tickets.includes.ticket_scripts')


        <div class="card">
            <div class="card-body">
                <form id="NurseAssessmentForm" action="" method="POST">
                    @csrf
                    <!-- Essential Patient Info (Always Visible) -->
                    <div class="">
                        <h5 class="mb-0">Patient Information</h5>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                @include('customers.customer-search')
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="visit_date">Visit Date</label>
                                        <input type="date" class="datepicker form-control" placeholder="Select Date"
                                            name="visit_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="visit_time">Visit Time</label>
                                        <input type="time" class="timepicker form-control" name="visit_time">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Accordion for remaining sections -->
                    <div class="accordion" id="nurseAssessmentAccordion">
                        <!-- Vital Signs Section -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="headingVitals">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseVitals" aria-expanded="true"
                                    aria-controls="collapseVitals">
                                    Vital Signs
                                </button>
                            </h2>
                            <div id="collapseVitals" class="accordion-collapse collapse show"
                                aria-labelledby="headingVitals" data-bs-parent="#nurseAssessmentAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="blood_pressure">BP (mmHg)</label>
                                                <input type="text" class="form-control" id="blood_pressure"
                                                    name="blood_pressure" placeholder="e.g., 120/80">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="pulse_rate">Pulse (bpm)</label>
                                                <input type="number" class="form-control" id="pulse_rate"
                                                    name="pulse_rate">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="respiratory_rate">Resp
                                                    Rate</label>
                                                <input type="number" class="form-control" id="respiratory_rate"
                                                    name="respiratory_rate">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="temperature">Temp (°C)</label>
                                                <input type="number" class="form-control" id="temperature"
                                                    name="temperature" step="0.1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="oxygen_saturation">O₂ Sat
                                                    (%)</label>
                                                <input type="number" class="form-control" id="oxygen_saturation"
                                                    name="oxygen_saturation">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="height">Height (cm)</label>
                                                <input type="number" class="form-control" id="height" name="height"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="weight">Weight (kg)</label>
                                                <input type="number" class="form-control" id="weight" name="weight"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="bmi">BMI</label>
                                                <input type="text" class="form-control" id="bmi" name="bmi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical History Section -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="headingMedicalHistory">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseMedicalHistory" aria-expanded="false"
                                    aria-controls="collapseMedicalHistory">
                                    Medical History
                                </button>
                            </h2>
                            <div id="collapseMedicalHistory" class="accordion-collapse collapse"
                                aria-labelledby="headingMedicalHistory" data-bs-parent="#nurseAssessmentAccordion">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="existing_conditions">Existing
                                            Conditions</label>
                                        <textarea class="form-control" id="existing_conditions"
                                            name="existing_conditions" rows="2"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="current_medications">Current
                                            Medications</label>
                                        <textarea class="form-control" id="current_medications"
                                            name="current_medications" rows="2"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mb-2">Allergies</label>
                                        <div class="d-flex flex-wrap gap-3 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="medication_allergies" name="allergies[]" value="medication">
                                                <label class="form-check-label"
                                                    for="medication_allergies">Medication</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="food_allergies"
                                                    name="allergies[]" value="food">
                                                <label class="form-check-label" for="food_allergies">Food</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="environmental_allergies" name="allergies[]"
                                                    value="environmental">
                                                <label class="form-check-label"
                                                    for="environmental_allergies">Environmental</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="no_allergies"
                                                    name="allergies[]" value="none">
                                                <label class="form-check-label" for="no_allergies">None</label>
                                            </div>
                                        </div>
                                        <div id="allergies_details_container" class="mb-3">
                                            <textarea class="form-control" id="allergy_details" name="allergy_details"
                                                rows="2" placeholder="Specify allergies"></textarea>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        id="showMoreHistoryBtn">
                                        <i class="fas fa-plus-circle"></i> Show Additional History Fields
                                    </button>

                                    <div id="additionalHistoryFields" class="mt-3" style="display:none;">
                                        <div class="mb-3">
                                            <label class="form-label" for="previous_surgeries">Previous
                                                Surgeries</label>
                                            <textarea class="form-control" id="previous_surgeries"
                                                name="previous_surgeries" rows="2"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="immunization_history">Immunization
                                                History</label>
                                            <textarea class="form-control" id="immunization_history"
                                                name="immunization_history" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pain Assessment -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="headingPain">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePain" aria-expanded="false" aria-controls="collapsePain">
                                    Pain Assessment
                                </button>
                            </h2>
                            <div id="collapsePain" class="accordion-collapse collapse" aria-labelledby="headingPain"
                                data-bs-parent="#nurseAssessmentAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label mb-2">Is patient experiencing pain?</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="has_pain"
                                                        id="has_pain_yes" value="yes">
                                                    <label class="form-check-label" for="has_pain_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="has_pain"
                                                        id="has_pain_no" value="no" checked>
                                                    <label class="form-check-label" for="has_pain_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="painDetailsContainer" style="display:none;">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="pain_scale">Pain Scale
                                                    (0-10)</label>
                                                <input type="range" class="form-range" min="0" max="10" step="1"
                                                    id="pain_scale" name="pain_scale" value="0">
                                                <div class="d-flex justify-content-between">
                                                    <span>0</span>
                                                    <span>5</span>
                                                    <span>10</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="pain_scale_value">Pain
                                                    Value</label>
                                                <input type="number" class="form-control" id="pain_scale_value"
                                                    name="pain_scale_value" readonly value="0">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="pain_areas">Areas of Pain</label>
                                            <textarea class="form-control" id="pain_areas" name="pain_areas"
                                                rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Female-specific section (conditionally shown) -->
                        <div class="accordion-item mb-2" id="female_specific_section" style="display:none;">
                            <h2 class="accordion-header" id="headingGynecology">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseGynecology" aria-expanded="false"
                                    aria-controls="collapseGynecology">
                                    OB/GYN History
                                </button>
                            </h2>
                            <div id="collapseGynecology" class="accordion-collapse collapse"
                                aria-labelledby="headingGynecology" data-bs-parent="#nurseAssessmentAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="lmp">Last Menstrual Period</label>
                                            <input type="text" class="datepicker form-control" id="lmp" name="lmp">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="fp">Family Planning Method</label>
                                            <input type="text" class="form-control" id="fp" name="fp">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="parity">Parity</label>
                                            <input type="text" class="form-control" id="parity" name="parity"
                                                placeholder="e.g., G3P2">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="is_pregnant">Pregnancy Status</label>
                                            <select class="form-select" id="is_pregnant" name="is_pregnant">
                                                <option value="no">Not Pregnant</option>
                                                <option value="yes">Pregnant</option>
                                                <option value="unsure">Unsure</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="pregnancy_details" style="display:none;">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="gbd">Gestational Age</label>
                                                <input type="text" class="form-control" id="gbd" name="gbd">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="edd">Expected Delivery
                                                    Date</label>
                                                <input type="text" class="datepicker form-control" id="edd" name="edd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pre-existing conditions -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="headingConditions">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseConditions" aria-expanded="false"
                                    aria-controls="collapseConditions">
                                    Pre-existing Health Conditions
                                </button>
                            </h2>
                            <div id="collapseConditions" class="accordion-collapse collapse"
                                aria-labelledby="headingConditions" data-bs-parent="#nurseAssessmentAccordion">
                                <div class="accordion-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="hypertension"
                                                    name="pre_existing_conditions[]" value="hypertension">
                                                <label class="form-check-label" for="hypertension">Hypertension</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="diabetes"
                                                    name="pre_existing_conditions[]" value="diabetes">
                                                <label class="form-check-label" for="diabetes">Diabetes</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="asthma"
                                                    name="pre_existing_conditions[]" value="asthma">
                                                <label class="form-check-label" for="asthma">Asthma</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="heart_disease"
                                                    name="pre_existing_conditions[]" value="heart_disease">
                                                <label class="form-check-label" for="heart_disease">Heart
                                                    Disease</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="thyroid"
                                                    name="pre_existing_conditions[]" value="thyroid">
                                                <label class="form-check-label" for="thyroid">Thyroid
                                                    Disorder</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="hiv"
                                                    name="pre_existing_conditions[]" value="hiv">
                                                <label class="form-check-label" for="hiv">HIV/AIDS</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="other_condition"
                                                    name="pre_existing_conditions[]" value="other">
                                                <label class="form-check-label" for="other_condition">Other</label>
                                            </div>
                                            <textarea class="form-control mt-2" id="other_conditions_detail"
                                                name="other_conditions_detail" rows="2"
                                                placeholder="Please specify other conditions"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nurse observations -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header" id="headingObservations">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseObservations" aria-expanded="false"
                                    aria-controls="collapseObservations">
                                    Nurse Observations
                                </button>
                            </h2>
                            <div id="collapseObservations" class="accordion-collapse collapse"
                                aria-labelledby="headingObservations" data-bs-parent="#nurseAssessmentAccordion">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="nurse_observations">Assessment &
                                            Comments</label>
                                        <textarea class="form-control" id="nurse_observations" name="nurse_observations"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3 mb-4">
                        <button type="button" class="btn btn-secondary me-2">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Assessment</button>
                    </div>
                </form>

                <!-- JavaScript for dynamic behavior -->

                <!-- Add JavaScript for automatic BMI calculation and pain scale display -->

            </div>
        </div>

    </div>


    <!-- Modal -->
    <!-- Your index file -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
                    <button type="button" class="btn-close start" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('customers.modal')
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            initializeSelect2('#selectDoctor', '{{URL('settings/all-doctors')}}');

        });


        document.addEventListener("DOMContentLoaded", () => {
    flatpickr(".datepicker", {
        defaultDate: new Date(),
        minDate: "today", // Disables all dates prior to today
        disable: [
            function (date) {
                return date.getDay() === 0;
            },
        ],
    });

    flatpickr(".timepicker", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K", // Add 'K' for AM/PM format
    defaultDate: new Date(), // Set the current time as default
    time_24hr: false, // Set to false to enable AM/PM
    minTime: "09:00", // Minimum time is 9:00 AM
    maxTime: "17:00"  // Maximum time is 5:00 PM
});

document.addEventListener('DOMContentLoaded', function() {
                                // Calculate BMI automatically
                                const heightInput = document.getElementById('height');
                                const weightInput = document.getElementById('weight');
                                const bmiInput = document.getElementById('bmi');
                                
                                function calculateBMI() {
                                    if (heightInput.value && weightInput.value) {
                                        const heightInMeters = parseFloat(heightInput.value) / 100;
                                        const weightInKg = parseFloat(weightInput.value);
                                        const bmi = (weightInKg / (heightInMeters * heightInMeters)).toFixed(1);
                                        bmiInput.value = bmi;
                                    }
                                }
                                
                                heightInput.addEventListener('input', calculateBMI);
                                weightInput.addEventListener('input', calculateBMI);
                                
                                // Pain assessment toggle
                                const hasPainYes = document.getElementById('has_pain_yes');
                                const hasPainNo = document.getElementById('has_pain_no');
                                const painDetailsContainer = document.getElementById('painDetailsContainer');
                                
                                hasPainYes.addEventListener('change', function() {
                                    if (this.checked) {
                                        painDetailsContainer.style.display = 'block';
                                    }
                                });
                                
                                hasPainNo.addEventListener('change', function() {
                                    if (this.checked) {
                                        painDetailsContainer.style.display = 'none';
                                    }
                                });
                                
                                // Update pain scale value
                                const painScale = document.getElementById('pain_scale');
                                const painScaleValue = document.getElementById('pain_scale_value');
                                
                                painScale.addEventListener('input', function() {
                                    painScaleValue.value = this.value;
                                });
                                
                                // Toggle additional history fields
                                const showMoreHistoryBtn = document.getElementById('showMoreHistoryBtn');
                                const additionalHistoryFields = document.getElementById('additionalHistoryFields');
                                
                                showMoreHistoryBtn.addEventListener('click', function() {
                                    if (additionalHistoryFields.style.display === 'none') {
                                        additionalHistoryFields.style.display = 'block';
                                        this.innerHTML = '<i class="fas fa-minus-circle"></i> Hide Additional History Fields';
                                    } else {
                                        additionalHistoryFields.style.display = 'none';
                                        this.innerHTML = '<i class="fas fa-plus-circle"></i> Show Additional History Fields';
                                    }
                                });
                                
                                // Pregnancy details toggle
                                const isPregnantSelect = document.getElementById('is_pregnant');
                                const pregnancyDetails = document.getElementById('pregnancy_details');
                                
                                isPregnantSelect.addEventListener('change', function() {
                                    if (this.value === 'yes') {
                                        pregnancyDetails.style.display = 'block';
                                    } else {
                                        pregnancyDetails.style.display = 'none';
                                    }
                                });
                                
                                // Female section toggle based on gender
                                // This would be called when patient data is loaded
                                function toggleFemaleSection(gender) {
                                    const femaleSection = document.getElementById('female_specific_section');
                                    if (gender && gender.toLowerCase() === 'female') {
                                        femaleSection.style.display = 'block';
                                    } else {
                                        femaleSection.style.display = 'none';
                                    }
                                }
                                
                                // This is a placeholder - in your actual implementation,
                                // you would call this when patient data is loaded
                                // For example: document.addEventListener('patientLoaded', function(e) { toggleFemaleSection(e.detail.gender); });
                                
                                // For demonstration, we'll assume we can get gender from somewhere
                                // Replace this with your actual implementation
                                document.addEventListener('patientSelected', function(e) {
                                    // Example: toggleFemaleSection(e.detail.gender);
                                });
                            });



    </script>





</x-app-layout>