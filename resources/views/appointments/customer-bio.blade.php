<style>
    .timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 30px;
        width: 4px;
        height: 100%;
        background: #dee2e6;
    }

    .timeline-item {
        position: relative;
        margin: 2rem 0;
        padding-left: 60px;
    }

    .timeline-item .timeline-icon {
        position: absolute;
        top: 0;
        left: 15px;
        width: 30px;
        height: 30px;
        background: #0d6efd;
        border-radius: 50%;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .timeline-item .timeline-content {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
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
                        <a class="nav-link" data-bs-toggle="tab" href="#profile-allergies" role=" tab"
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


                <!-- History Tab Content -->
                <div class="tab-pane fade" id="profile-history" role="tabpanel">
                    <!-- Timeline 1 - Bootstrap Brain Component -->
                    <div class="container py-5">
                        <div class="timeline">
                            <!-- Timeline Item 1 -->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Step 1</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt justo
                                        eget ultricies fringilla.</p>
                                    <span class="text-muted">Jan 1, 2023</span>
                                </div>
                            </div>
                            <!-- Timeline Item 2 -->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Step 2</h5>
                                    <p>Aliquam erat volutpat. Praesent accumsan elit at nisi facilisis, non tincidunt
                                        nulla consequat.</p>
                                    <span class="text-muted">Feb 15, 2023</span>
                                </div>
                            </div>
                            <!-- Timeline Item 3 -->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-star"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Step 3</h5>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium.</p>
                                    <span class="text-muted">Mar 20, 2023</span>
                                </div>
                            </div>
                            <!-- Timeline Item 4 -->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-flag"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Step 4</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
                                        molestiae consequatur.</p>
                                    <span class="text-muted">Apr 30, 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap JS and Icons -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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

        const allergiesList = $('#profile-allergies');
    allergiesList.empty(); // Clear previous entries

    if (customer.allergies && customer.allergies.length > 0) {
        customer.allergies.forEach(allergy => {
            allergiesList.append(`<li>${allergy}</li>`);
        });
    } else {
        allergiesList.append('<li>No allergies listed</li>');
    }

  


}
</script>