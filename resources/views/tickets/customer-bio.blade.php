<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            {{-- <h4 class="card-title">Create Ticket</h4> --}}
        </div>
    </div>
    <div class="card-body" id="customerBio">
        <img src="{{asset('client-images/7758834.jpg')}}" id="customerBioImageHolder" alt="Image" />
        <div id="customerBioInner" style="display:none;">
            <h5 class="cardTitle" id="customerName">help</h5>
            <p class="cardText" id="customerPhone"><strong>Phone Number:</strong></p>
            <p class="cardText" id="customerEmail"><strong>Email:</strong></p>
            <p class="cardText" id="customerAltPhone"><strong>Alternate Number:</strong></p>
            <p class="cardText" id="customerCreated"><strong>Created At:</strong></p>
            <p class="cardText" id="customerCompanyId"><strong>Company ID:</strong></p>
        </div>

    </div>
</div>
<script>
    function initCustomer() {
        let customer = `@json($customer)`
        console.log('customer:', customer)
        if (customer !== 'null') {
            renderCustomerBio(customer)
        }
    }

    initCustomer()

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

        customerBioInner.find('#customerName').text(customer.first_name)
        customerBioInner.find('#customerName').text(customer.second_name)
        customerBioInner.find('#customerEmail').text(customer.email)
        customerBioInner.find('#customerPhone').text(customer.phone_number)
        customerBioInner.find('#customerCreatedAt').text(customer.created_at)
        customerBioInner.find('#customerName').text(customer.first_name)

    }

</script>