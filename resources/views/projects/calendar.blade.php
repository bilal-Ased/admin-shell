<!-- resources/views/calendar.blade.php -->
<x-app-layout :assets="$assets ?? []">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendar Page</title>

        <!-- Include FullCalendar CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" />

        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>

    <body>
        <br><br><br>
        <div id="calendar"></div>

        <!-- Include FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>

        <!-- Include Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    events: '/projects/get', // URL to fetch projects from
                    eventClick: function(info) {
                        // Handle event click
                        var project = info.event.extendedProps;

                        // Display project details using a Bootstrap modal
                        $('#modalTitle').text(project.name);
                        $('#customerName').text('Customer: ' + project.customer);
                        $('#description').text('Description: ' + project.description);
                        $('#startDate').text('Start Date: ' + project.start_date);
                        $('#endDate').text('End Date: ' + project.end_date);
                        $('#modal').modal('show');
                    },
                    // Add other calendar configuration options as needed
                });

                calendar.render();
            });
        </script>

        <!-- Bootstrap Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="customerName"></p>
                        <p id="description"></p>
                        <p id="startDate"></p>
                        <p id="endDate"></p>
                        <!-- Add more project details as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
</x-app-layout>
