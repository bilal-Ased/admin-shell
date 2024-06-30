<x-app-layout layout="landing" :isHeader1=true>
    <div class="banner-one-app">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h1 class="text-primary mb-4">We Build Products <br> to <span class="text-secondary">Solve
                            Problems</span> </h1>
                </div>
                <div class="col-lg-4">
                    <p>Embark on a journey of unparalleled solutions crafted just for you. Our commitment to
                        cutting-edge innovation ensures your experience is nothing short of extraordinary. Ready to
                        elevate your endeavors? Join us on this transformative ride! </p>
                    <div class="d-flex align-items-center">
                        <a hrer="javascript" class="btn btn-primary" id="bookDemo">Book Demo</a>
                        <a hrer="javascript" class="btn btn-secondary ms-3">Get Qoute</a>
                    </div>
                    <div class="modal fade" id="bookDemoModal" tabindex="-1" aria-labelledby="bookDemoLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookDemoModal">Book Demo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="First Name"
                                                id="first_name" name="first_name" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" id="second_name"
                                                placeholder="Second Name" name="second_name">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                id="phone_number" name="phone_number" required>
                                        </div>
                                        <div class="col">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Email Address" name="email">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <input type="date"
                                                class="form-control  date_flatpicker flatpickr-input active"" id="
                                                end_date" placeholder="End Date" name="end_date">

                                        </div>
                                        <div class="col">
                                            <input type="time"
                                                class="form-control  date_flatpicker flatpickr-input active"" id=" time"
                                                placeholder="End Date" name="time">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-4 mt-lg-0">
                    <img src="{{ asset('images/landing-pages/images/home-5/top-banner.webp') }}" alt=""
                        class="img-fluid ">
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding page-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-3 text-uppercase text-primary">
                        about us
                    </p>
                    <h2 class=" mb-4">What are <span class="text-primary">we</span></h2>
                    <p class="mb-5">Welcome to Tidal Wave Technologies! We specialize in building cutting-edge ERP,
                        CRM, websites, mobile apps, and integrating payments and social channels. Our innovative
                        solutions provide real-time insights, streamline operations, and enhance business performance.
                        At Tidal Wave Technologies, we bring your software dreams to life. Dive into the future with us!
                    </p>
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="text-primary mb-2">100%</h5>
                            <p class="mb-0">Satisfaction</p>
                        </div>
                        <div class="ms-4">
                            <h5 class="text-primary mb-2">15k</h5>
                            <p class="mb-0">Deployments</p>
                        </div>
                        <div class="ms-4">
                            <h5 class="text-primary mb-2">24/7</h5>
                            <p class="mb-0">Support</p>
                        </div>
                    </div>
                    <a hrer="#" class="btn btn-primary mt-4">Get Started</a>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <img src="{{ asset('images/landing-pages/images/home-5/about-5.webp') }}" alt="" class="img-fluid ">
                </div>
            </div>
        </div>
    </div>
    <div class="section-card-padding bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="mb-3 text-uppercase text-primary">
                        Features
                    </p>
                    <h2 class=" mb-4">Features Provided <span class="text-primary">For You </span></h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 text-center">
                <x-landing-pages.widgets.feature-section />
            </div>
        </div>
    </div>
    <div class="section-padding bg-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="mb-2 text-white">
                        Get in Touch Now
                    </p>
                    <h2 class="mb-5 text-white">Fast, easy, and <span class="text-primary">Affordable</span> </h2>
                    <p class="">Ready to transform your business with cutting-edge software solutions? Our team of
                        experts is here to help you every step of the way. Whether you need custom software development,
                        IT consulting, or seamless integration services, we've got you covered.
                        suspendisse. Mi volutpat vel convallis sed risus egestas.</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="#" class="btn btn-primary">Book a Consultation</a>
                        <a href="#" class="btn btn-light ms-2">Get In Touch on WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <p class="mb-3 text-primary text-uppercase">Pricing</p>
                    <h2 class="mb-4">Our <span class="text-primary">Price Plans</span></h2>
                </div>
            </div>
            <div class="row  row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="col">
                    <div class="card text-center mb-4 mb-lg-0">
                        <div class="card-header bg-soft-primary pb-4">
                            <h6 class="mb-3">Free</h6>
                            <h4 class="">$0 <br>
                                <h6>/Month</h6>
                            </h4>
                            <a href="#" class="btn btn-primary mt-3">Get Started</a>
                        </div>
                        <div class="card-body ">
                            <p>1-page website </p>
                            <p>Basic template </p>
                            <p class="text-decoration-line-through">2GB of storage</p>
                            <p class="text-decoration-line-through">Email support</p>
                            <p class="text-decoration-line-through">Help center access</p>
                            <p class="text-decoration-line-through">Limited customization options</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center mb-4 mb-lg-0">
                        <div class="card-header bg-soft-primary pb-4">
                            <h6 class="mb-3">Pro</h6>
                            <h4 class="">$199<br>
                                <h6>/Month</h6>
                            </h4>
                            <a href="#" class="btn btn-primary mt-3">Get Started</a>
                        </div>
                        <div class="card-body ">
                            <p>Up to 5-page website</p>
                            <p>Standard templates </p>
                            <p>Basic customization options </p>
                            <p class="text-decoration-line-through">Priority Email support</p>
                            <p>2GB of Storage</p>
                            <p>Help center access</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center mb-4 mb-lg-0">
                        <div class="card-header bg-primary pb-4">
                            <h6 class="mb-3 text-white">Enterprise</h6>
                            <h4 class="text-white">$399<br>
                                <h6 class=" text-white">/Month</h6>
                            </h4>
                            <a href="#" class="btn btn-outline-light mt-3">Get Started</a>
                        </div>
                        <div class="card-body ">
                            <p>Custom-designed website
                            </p>
                            <p>Unlimited pages </p>
                            <p>Advanced customization options </p>
                            <p>Call and email support
                            </p>
                            <p>15GB Access</p>
                            <p class="text-decoration-line-through">Help center access</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center mb-0">
                        <div class="card-header bg-soft-primary pb-4">
                            <h6 class="mb-3">Premium</h6>
                            <h4 class="">5399<br>
                                <h6>/Month</h6>
                            </h4>
                            <a href="#" class="btn btn-primary mt-3">Get Started</a>
                        </div>
                        <div class="card-body ">
                            <p>Highly customized solutions

                            </p>
                            <p>Scalable architecture
                            </p>
                            <p>Advanced customization </p>
                            <p>Dedicated support team
                            </p>
                            <p>24/7 support availability
                            </p>
                            <p>Unlimited Access
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-card-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <p class="mb-3 text-primary text-uppercase">Reviews</p>
                    <h2 class="mb-5">What our <span class="text-primary">Customer’s are saying</span></h2>
                </div>
                <div class="overflow-hidden slider-circle-btn" id="testimonial-one-slider">
                    <ul class="p-0 m-0 swiper-wrapper list-inline">
                        <li class="swiper-slide card-slide card overflow-hidden mb-0">
                            <x-landing-pages.widgets.testimonial-one testTitle="A true game changer." testText="“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae, eget condimentum
                        luctus nec nec tellus sem sed. Diam elementum tellus posuere ipsum tortor.”"
                                testUser="user-1.webp" userTitle="Eleen Rogers" Id="01" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden mb-0">
                            <x-landing-pages.widgets.testimonial-one testTitle="Best you can Get" testText="“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae, eget condimentum
                        luctus nec nec tellus sem sed. Diam elementum tellus posuere ipsum tortor.”"
                                testUser="user-2.webp" userTitle="Brooklyn Simmons" Id="02" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden mb-0">
                            <x-landing-pages.widgets.testimonial-one testTitle="Perfect poduct for your
                        business" testText="“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae, eget
                        condimentum luctus nec nec tellus sem sed. Diam elementum tellus posuere ipsum tortor.”"
                                testUser="user-3.webp" userTitle="Jenny Wilson" Id="03" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden mb-0">
                            <x-landing-pages.widgets.testimonial-one testTitle="A true game changer." testText="“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae, eget condimentum
                        luctus nec nec tellus sem sed. Diam elementum tellus posuere ipsum tortor.”"
                                testUser="user-1.webp" userTitle="Eleen Rogers" Id="01" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden mb-0">
                            <x-landing-pages.widgets.testimonial-one testTitle="Best you can Get" testText="“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae, eget condimentum
                        luctus nec nec tellus sem sed. Diam elementum tellus posuere ipsum tortor.”"
                                testUser="user-2.webp" userTitle="Brooklyn Simmons" Id="02" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden mb-0">
                            <x-landing-pages.widgets.testimonial-one testTitle="Perfect poduct for your
                        business" testText="“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae, eget
                        condimentum luctus nec nec tellus sem sed. Diam elementum tellus posuere ipsum tortor.”"
                                testUser="user-3.webp" userTitle="Jenny Wilson" Id="03" />
                        </li>
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-box bg-secondary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 align-items-center ">
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client client clientImage="07.webp" />
                </div>
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client client clientImage="08.webp" />
                </div>
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client client clientImage="09.webp" />
                </div>
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client client clientImage="10.webp" />
                </div>
                <div class="col d-flex justify-content-center">
                    <x-landing-pages.widgets.client client clientImage="11.webp" />
                </div>
            </div>
        </div>
    </div>

    <div class="section-card-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-6">
                    <p class="mb-2 text-uppercase text-primary">
                        faq
                    </p>
                    <h2 class="text-secondary mb-4">Foremost Common <span class="text-primary">Questions</span></h2>
                    <p class="mb-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit
                        officia
                        consequat duis enim velit mollit. Exercitation veniam consequat.</p>
                </div>
                <div class="col-lg-7 col-xl-6 mt-4 mt-lg-0">
                    <div class="accordion custom-accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                                        amet
                                        sint. Velit officia consequat duis enim velit mollit. Exercitation veniam
                                        consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                                        amet
                                        sint. Velit officia consequat duis enim velit mollit. Exercitation veniam
                                        consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                                        amet
                                        sint. Velit officia consequat duis enim velit mollit. Exercitation veniam
                                        consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                                        amet
                                        sint. Velit officia consequat duis enim velit mollit. Exercitation veniam
                                        consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                                        amet
                                        sint. Velit officia consequat duis enim velit mollit. Exercitation veniam
                                        consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-analytics.js";

        const firebaseConfig = {
            apiKey: "AIzaSyAdYC4caf6YIPqKBPM-IeZ81saSRPjSRXo",
            authDomain: "kati-crm-test.firebaseapp.com",
            projectId: "kati-crm-test",
            storageBucket: "kati-crm-test.appspot.com",
            messagingSenderId: "164843034020",
            appId: "1:164843034020:web:7f05ca96dd04ff57c69d31",
            measurementId: "G-58E2MD82CX"
        };





        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>


    <a href="https://wa.me/254797686905" class="wa-float-img-circle" target="_blank">
        <img src="https://cdn.sendpulse.com/img/messengers/sp-i-small-forms-wa.svg" alt="WhatsApp" />
    </a>
    <style type="text/css">
        .wa-float-img-circle {
            width: 56px;
            height: 56px;
            bottom: 20px;
            left: 20px;
            border-radius: 100%;
            position: fixed;
            z-index: 99999;
            display: flex;
            transition: all .3s;
            align-items: center;
            justify-content: center;
            background: #25D366;
        }

        .wa-float-img-circle img {
            position: relative;
        }

        .wa-float-img-circle:before {
            position: absolute;
            content: '';
            background-color: #25D366;
            width: 70px;
            height: 70px;
            bottom: -7px;
            right: -7px;
            border-radius: 100%;
            animation: wa-float-circle-fill-anim 2.3s infinite ease-in-out;
            transform-origin: center;
            opacity: .2;
        }

        .wa-float-img-circle:hover {
            box-shadow: 0px 3px 16px #24af588a;
        }

        .wa-float-img-circle:focus {
            box-shadow: 0px 0 0 3px #25d36645;
        }

        .wa-float-img-circle:hover:before,
        .wa-float-img-circle:focus:before {
            display: none;
        }

        @keyframes wa-float-circle-fill-anim {
            0% {
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }

            50% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }

            100% {
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }
    </style>


    <script>
        document.getElementById('bookDemo').addEventListener('click', function(){
            $("#bookDemoModal").modal('show');
        });

    </script>
</x-app-layout>