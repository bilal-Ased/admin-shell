<style>
    .nav-tabs {
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 0;
    }

    .nav-tabs .nav-link {
        color: #6366f1;
        font-weight: bold;
        margin-right: 1rem;
        transition: color 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: white;
        background-color: #6366f1;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        transition: background-color 0.3s ease;
    }

    /* Line between tabs and content */
    #myTabContent {
        border-top: 2px solid #e0e0e0;
        padding-top: 10px;
        margin-top: 10px;
    }

    /* Preloader styling */
    .preloader {
        display: none;
        /* Hidden by default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 1050;
        /* Higher than other elements */
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #6366f1;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="card">

    <div class="card-body" id="customerBio">
        <img src="{{asset('images/brands/appointment.jpg')}}" id="customerBioImageHolder" alt="Image" />
        <div id="customerBioInner" style="display:none;">
            <div id="tabsContainer">
                <ul class="nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profile-bio" role="tab"
                            aria-selected="true">Bio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-allergies" role="tab"
                            aria-selected="false">Allergies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-history" role="tab"
                            aria-selected="false">History</a>
                    </li>
                </ul>
            </div>

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
                    <table class="table table-striped table-hove">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Doctor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>

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