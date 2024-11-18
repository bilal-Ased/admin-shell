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
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header d-flex justify-content-between flex-wrap">
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
                                <h4 class="card-title mb-2">Five Upcoming Appointments</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive mt-4">
                                <table id="basic-table" class="table table-striped mb-0" role="grid">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fiveUpcomingAppointments as $fiveUpcomingAppointment)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6>{{ $fiveUpcomingAppointment->customer->first_name ?? null }}
                                                        {{ $fiveUpcomingAppointment->customer->last_name ?? null}}</h6>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $topFiveTicket->ticketSources->name }}</td> --}}
                                            <td>
                                                @php
                                                $fiveUpcomingAppointment = new
                                                DateTime($fiveUpcomingAppointment->created_at);
                                                $now = new DateTime();
                                                $interval = $fiveUpcomingAppointment->diff($now);

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
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                        </div>
                        <div class="card-body">
                            <div id="statusChart" class="statusChart"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-12">
                    <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title mb-2">Appointments By Users</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="userAppointmentData" class="userAppointmentData"></div>

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


                fetch('/appointments-user')
    .then(response => response.json())
    .then(appointmentData => {
        // Prepare the data for users and their total appointments
        const users = [];
        const appointments = [];

        // Loop through each month and each user
        for (const month in appointmentData) {
            const monthData = appointmentData[month];

            monthData.forEach(userData => {
                // Check if the user already exists in the users array
                const userIndex = users.findIndex(user => user.username === userData.username);
                
                if (userIndex === -1) {
                    // If the user doesn't exist, add them
                    users.push(userData.username);
                    appointments.push(userData.appointments); // Add their appointments
                } else {
                    // If the user already exists, add their appointments to the existing total
                    appointments[userIndex] += userData.appointments;
                }
            });
        }

        // Prepare the chart using Highcharts
        Highcharts.chart('userAppointmentData', {
            chart: {
                type: 'column' // You can change this to 'bar' if you want horizontal bars
            },
            title: {
                text: 'Total Appointments by User for ' + new Date().getFullYear(),
                align: 'center'
            },
            xAxis: {
                categories: users, // Use the users as categories on the X-axis
                title: {
                    text: 'Users'
                },
                accessibility: {
                    description: 'Users and the number of appointments they made'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Appointments'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b> appointments'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Appointments',
                data: appointments // The number of appointments for each user
            }]
        });
    })
    .catch(error => console.error('Error fetching data:', error)); // Handle any errors


        });




                // Fetch appointment data and create the pie chart
            fetch('{{ route("menu-style.statusChart") }}') // Replace with your actual route name
            .then(response => response.json())
            .then(data => {
                Highcharts.chart('statusChart', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Appointments by Status'
                    },
                    tooltip: {
                        pointFormat: '<b>{point.name}</b>: {point.y} appointments ({point.percentage:.1f}%)'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: [{
                                enabled: true,
                                distance: 20
                            }, {
                                enabled: true,
                                distance: -40,
                                format: '{point.percentage:.1f}%',
                                style: {
                                    fontSize: '1.2em',
                                    textOutline: 'none',
                                    opacity: 0.7
                                },
                                filter: {
                                    operator: '>',
                                    property: 'percentage',
                                    value: 10
                                }
                            }]
                        }
                    },
                    series: [{
                        name: 'Status',
                        colorByPoint: true,
                        data: data // Pass the appointment data directly here
                    }]
                });
            })
            .catch(error => console.error('Error fetching data:', error));

        fetch('/appointments/activity')
    .then(response => response.json())
    .then(appointments => {
        const appointmentsList = document.getElementById('appointments-list');
        appointmentsList.innerHTML = ''; // Clear existing content

        if (appointments.message) {
            // If there's no activity, show the message
            const noActivityMessage = document.createElement('p');
            noActivityMessage.textContent = appointments.message;
            appointmentsList.appendChild(noActivityMessage);
            return;
        }

        // Loop through the appointments and display the last 3 activities
        appointments.forEach(appointment => {
            const activityItem = document.createElement('div');
            activityItem.classList.add('d-flex', 'profile-media', 'align-items-top', 'mb-2');

            const profileDots = document.createElement('div');
            profileDots.classList.add('profile-dots-pills', 'border-primary', 'mt-1');
            activityItem.appendChild(profileDots);

            const infoDiv = document.createElement('div');
            infoDiv.classList.add('ms-4');

            const title = document.createElement('h6');
            title.classList.add('mb-1');
            // Display the customer's name
            title.textContent = appointment.customer ? appointment.customer.first_name : 'Unknown Customer';
            infoDiv.appendChild(title);

            const dateTime = document.createElement('span');
            dateTime.classList.add('mb-0');
            // Display appointment date and time
            dateTime.textContent = new Date(appointment.appointment_date + ' ' + appointment.appointment_time).toLocaleString();
            infoDiv.appendChild(dateTime);

            activityItem.appendChild(infoDiv);
            appointmentsList.appendChild(activityItem);
        });
    });



       


    </script>
</x-app-layout>