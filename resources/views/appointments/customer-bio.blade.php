<div class="card">

    <div class="card-body" id="customerBio">
        <img src="{{asset('images/brands/appointment.jpg')}}" id="customerBioImageHolder" alt="Image" />
        <div id="customerBioInner" style="display:none;">
            <div id="tabsContainer">

                <ul class="nav nav-tabs" id="modalTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profile-bio"" role=" tab"
                            aria-controls="update-info" aria-selected="true">
                            Bio
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#customerAllergy" role=" tab"
                            aria-controls="customer-info" aria-selected="false">
                            Allergies
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-history" role="tab"
                            aria-controls="customer-info" aria-selected="false">
                            History
                        </a>
                    </li>
                </ul>

            </div>
            <div style="height: 2px; background-color: #7DAFF1; margin-top: 10px; margin-bottom: 10px;"></div>

            <!-- Tabs Content -->
            <div class="tab-content">
                <!-- Bio Tab Content -->
                <div class="tab-pane fade show active" id="profile-bio" role="tabpanel">
                    <p class="cardText">
                        <b>Name:</b> <span id="customerName"></span>
                    </p>
                    <p class="cardText">
                        <b>Phone Number:</b> <span id="customerPhone"></span>
                    </p>
                    <p class="cardText">
                        <b>Email:</b> <span id="customerEmail"></span>
                    </p>
                    <p class="cardText">
                        <b>Created At:</b> <span id="customerCreatedAt"></span>
                    </p>
                </div>

                <!-- Allergies Tab Content -->
                <div class="tab-pane fade" id="profile-allergies" role="tabpanel">
                    <p class="customerAllergy"></p>
                </div>

                <!-- History Tab Content -->
                <div class="tab-pane fade" id="profile-history" role="tabpanel">
                    <p class="cardText">Medical history will go here.</p>


                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function renderCustomerBio(customer) {
        if (typeof customer === 'string') {
            console.log('json parsing the customer...')            
            customer = JSON.parse(customer)
        }

        const customerBio = $('#customerBio')
        const customerBioImageHolder = customerBio.find('#customerBioImageHolder')
        const customerBioInner = customerBio.find('#customerBioInner')
        const tabsContainer = $('#tabsContainer') // Select the tabs container

        customerBioImageHolder.hide()
        customerBioInner.show()
        tabsContainer.show() // Show the tabs when a customer is selected

        customerBioInner.find('#customerName').text(customer.first_name + ' ' + customer.last_name)
        customerBioInner.find('#customerEmail').text(customer.email || 'No Email Address')
        customerBioInner.find('#customerPhone').text(customer.phone_number)
        customerBioInner.find('#customerCreatedAt').text(customer.created_at)

        $('#profile-allergies .customerAllergy').text(customer.email || 'No allergies listed')


}
</script>