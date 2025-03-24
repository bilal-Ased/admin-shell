<div class="modal-body">
    <form method="post" id="editCustomerForm">
        <div class="row">
            <div class="col">
                <label for="customerFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="customerFirstName" name="first_name">
            </div>
            <div class="col">
                <label for="customerLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="customerLastName" name="last_name">
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label for="customerPhoneNumber" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="customerPhoneNumber" name="phone_number">
            </div>
            <div class="col"><br>
                <label for="customerEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="customerEmail" name="email">
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label for="customerAge" class="form-label">Age</label>
                <input type="number" class="form-control" id="customerAge" name="age">
            </div>
            <div class="col"><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="bleedingCheckboxEdit" name="bleeding">

                    <label class="form-check-label" for="bleedingCheckboxEdit">Do you have any Bleeding?</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="drugTherapyCheckboxEdit" name="drug_therapy">
                    <label class="form-check-label" for="drugTherapyCheckboxEdit">Drug Therapy ?</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="heartDiseaseCheckboxEdit" name="heart_disease">
                    <label class="form-check-label" for="heartDiseaseCheckboxEdit">Heart Disease ?</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="pregnancyCheckboxEdit" name="pregnancy">
                    <label class="form-check-label" for="pregnancyCheckboxEdit">Pregnancy ?</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="allergiesCheckboxEdit">
                <label class="form-check-label" for="allergiesCheckboxEdit">Do you have any allergies?</label>
            </div>
            <textarea class="form-control allergies-commentEdit" id="allergiesCommentEdit" name="allergy"
                placeholder="Please list your allergies here..."></textarea>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>



<script>
    function getCustomerModal(customer) {
    customer = JSON.parse(customer);

    console.log('customer', customer)

    // Populate the form fields with customer data
    $('#customerFirstName').val(customer.first_name || '');
    $('#customerLastName').val(customer.last_name || '');
    $('#customerPhoneNumber').val(customer.phone_number || '');
    $('#customerEmail').val(customer.email || '');
    $('#customerAge').val(customer.age || '');

    if (customer.date_of_birth) {
        const formattedDOB = new Date(customer.date_of_birth).toISOString().split('T')[0];
        $('#dateOfBirth').val(formattedDOB);
    } else {
        $('#dateOfBirth').val('');
    }


    const fields = [
    { key: 'bleeding', selector: '#bleedingCheckboxEdit' },
    { key: 'pregnancy', selector: '#pregnancyCheckboxEdit' },
    { key: 'heart_disease', selector: '#heartDiseaseCheckboxEdit' },
    { key: 'drug_therapy', selector: '#drugTherapyCheckboxEdit' },
];

fields.forEach(field => {
    const value = customer.customer_profile?.[field.key];
    $(field.selector).prop('checked', !!value);
});


    const allergy = customer.customer_profile?.allergy
    if (allergy) {
        $('#allergiesCheckboxEdit').prop('checked', true);
        $('.allergies-commentEdit').show();
        $('#allergiesCommentEdit').val(allergy);
    } else {
        $('#allergiesCheckboxEdit').prop('checked', false);
        $('.allergies-commentEdit').hide();
    }

    // Update the form action dynamically
    var url = `{{ url('/customer/update/') }}/${customer.id}`;
    $('#editCustomerForm').attr('action', url);

    // Show the modal
    $('#editCustomerModal').modal('show');
}



</script>