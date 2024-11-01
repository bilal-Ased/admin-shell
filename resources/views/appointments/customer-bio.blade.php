<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            {{-- <h4 class="card-title">Create Ticket</h4> --}}
        </div>
    </div>
    <div class="card-body" id="customerBio">
        <img src="{{asset('images/brands/appointment.jpg')}}" id="customerBioImageHolder" alt="Image" />
        <div id="customerBioInner" style="display:none;">
            <h5 class="cardTitle" id="customerName">help</h5>
            <p class="cardText">
                <b>Phone Number:</b> <span id="customerPhone"></span>
            </p>

            <p class="cardText" id="customerEmail"><strong>Email:</strong></p>
            <p class="cardText" id="customerAltPhone"><strong>Alternate Number:</strong></p>
            <p class="cardText" id="customerCreatedAt"><strong>Created At:</strong></p>
        </div>

    </div>
</div>
<script>
    function renderCustomerBio(customer) {
    if (typeof customer === 'string') {
        console.log('json parsing the customer...')            
        customer = JSON.parse(customer)
    }
    console.log(customer)

    const customerBio = $('#customerBio')
    const customerBioImageHolder = customerBio.find('#customerBioImageHolder')
    const customerBioInner = customerBio.find('#customerBioInner')

    customerBioImageHolder.hide()
    customerBioInner.show()

    customerBioInner.find('#customerName').text(customer.first_name + ' ' + customer.last_name)
    customerBioInner.find('#customerEmail').text(customer.email)
    customerBioInner.find('#customerPhone').text(customer.phone_number)
    customerBioInner.find('#customerCreatedAt').text(customer.created_at)
}

</script>