<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Laravel Highcharts Demo</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>

<body>
    <h1>Highcharts in Laravel Example</h1>
    <div id="chartData" style="height: 400px; width: 100%;"></div>

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
                            align: 'left'
                        },
                        subtitle: {
                            text: 'Source: Your Application',
                            align: 'left'
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
</body>

</html>