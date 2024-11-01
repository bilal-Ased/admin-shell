<x-app-layout :assets="$assets ?? []">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="d-slider1 overflow-hidden ">
                    <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-01"
                                        class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                        data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                        <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Appointments Today</p>
                                        <h4 class="counter" style="visibility: visible;">{{ $appointmentsToday }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-02"
                                        class="circle-progress-01 circle-progress circle-progress-info text-center"
                                        data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                        <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Total Customers</p>
                                        <h4 class="counter">{{ $customerCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-03"
                                        class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                        data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                                        <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">My Appointments</p>
                                        <h4 class="counter">{{ $myAppointments }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-04"
                                        class="circle-progress-01 circle-progress circle-progress-info text-center"
                                        data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                                        <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Revenue</p>
                                        <h4 class="counter">$742K</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-05"
                                        class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                        data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                                        <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Net Income</p>
                                        <h4 class="counter">$150K</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-06"
                                        class="circle-progress-01 circle-progress circle-progress-info text-center"
                                        data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                                        <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Today</p>
                                        <h4 class="counter">$4600</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-07"
                                        class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                        data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                                        <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Members</p>
                                        <h4 class="counter">11.2M</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="800">
                        <div class="card-header d-flex justify-content-between flex-wrap">

                            {{-- --}}
                        </div>
                        <div class="card-body">
                            <div id="chartData" class="chartData"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-12">
                    <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title mb-2">Last five Tickets</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive mt-4">
                                <table id="basic-table" class="table table-striped mb-0" role="grid">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Cost</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topFiveTickets as $topFiveTicket)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6>{{ $topFiveTicket->customer->first_name ?? null }}
                                                        {{ $topFiveTicket->customer->last_name ?? null}}</h6>
                                                </div>
                                            </td>
                                            <td>{{ $topFiveTicket->ticketSources->name }}</td>
                                            <td>
                                                @php
                                                $topFiveTicketCreatedAt = new
                                                DateTime($topFiveTicket->created_at);
                                                $now = new DateTime();
                                                $interval = $topFiveTicketCreatedAt->diff($now);

                                                $days = $interval->days;
                                                $hours = $interval->h;
                                                $minutes = $interval->i;
                                                $seconds = $interval->s;

                                                $countdown = '';

                                                if ($days > 0) {
                                                $countdown .= $days . ' days ';
                                                }

                                                if ($hours > 0) {
                                                $countdown .= $hours . ' hours ';
                                                }

                                                if ($minutes > 0) {
                                                $countdown .= $minutes . ' minutes ';
                                                }



                                                echo rtrim($countdown). 'ago';
                                                @endphp
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    {{-- add new chart here --}}

                    <div class="card" data-aos="fade-up" data-aos-delay="1200">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Conversions</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton3"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    This Week
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="d-activity" class="d-activity"></div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-body d-flex justify-content-around text-center">
                            <div>
                                <h2 class="mb-2">750<small>K</small></h2>
                                <p class="mb-0 text-gray">Tickets this Month</p>
                            </div>
                            <hr class="hr-vertial">
                            <div>
                                <h2 class="mb-2">{{ $newCustomerCount }}</h2>
                                <p class="mb-0 text-gray">New Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title mb-2">Activity overview</h4>
                                <p class="mb-0">
                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#17904b"
                                            d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                                    </svg>
                                    16% this month
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" d-flex profile-media align-items-top mb-2">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h6 class=" mb-1">$2400, Purchase</h6>
                                    <span class="mb-0">11 JUL 8:10 PM</span>
                                </div>
                            </div>
                            <div class=" d-flex profile-media align-items-top mb-2">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h6 class=" mb-1">New order #8744152</h6>
                                    <span class="mb-0">11 JUL 11 PM</span>
                                </div>
                            </div>
                            <div class=" d-flex profile-media align-items-top mb-2">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h6 class=" mb-1">Affiliate Payout</h6>
                                    <span class="mb-0">11 JUL 7:64 PM</span>
                                </div>
                            </div>
                            <div class=" d-flex profile-media align-items-top mb-2">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h6 class=" mb-1">New user added</h6>
                                    <span class="mb-0">11 JUL 1:21 AM</span>
                                </div>
                            </div>
                            <div class=" d-flex profile-media align-items-top mb-1">
                                <div class="profile-dots-pills border-primary mt-1"></div>
                                <div class="ms-4">
                                    <h6 class=" mb-1">Product added</h6>
                                    <span class="mb-0">11 JUL 4:50 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- chart code --}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/chart')
                .then(response => response.json())
                .then(appointmentData => {
                    console.log(appointmentData); // Check the fetched data

                    const data = Object.values(appointmentData); // Convert to an array

                    Highcharts.chart('chartData', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Monthly Appointments for ' + new Date().getFullYear(),
                            align: 'center'
                        },
                        
                        xAxis: {
                            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            crosshair: true,
                            accessibility: {
                                description: 'Months of the year'
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Number of Appointments'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' appointments'
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: 'Appointments',
                            data: data // Use the converted array
                        }]
                    });
                })
                .catch(error => console.error('Error fetching data:', error)); // Handle any errors
        });
    </script>
</x-app-layout>