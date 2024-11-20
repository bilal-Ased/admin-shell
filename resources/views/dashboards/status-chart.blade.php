<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments by Status</title>
    <!-- Highcharts Library -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
        /* Optional: Add some styles for the statusChart */
        #statusChart {
            width: 100%;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>


<body>

    <h1>Appointments by Status</h1>
    <div id="statusChart"></div> <!-- Container for the chart -->

    <script>
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
    </script>

</body>

</html>