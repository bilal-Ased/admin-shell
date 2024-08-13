<div class="modal fade" id="bookDemoModal" tabindex="-1" aria-labelledby="bookDemoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Demo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First Name" id="first_name"
                                name="first_name" required>
                            <span class="text-danger" id="first_name_error"></span>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="last_name" placeholder="Second Name"
                                name="last_name">
                            <span class="text-danger" id="last_name_error"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Phone Number" id="phone_number"
                                name="phone_number" required>
                            <span class="text-danger" id="phone_number_error"></span>
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" id="email" placeholder="Email Address"
                                name="email">
                            <span class="text-danger" id="email_error"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="date" class="form-control" id="start_date" placeholder="Start Date"
                                name="start_date" required>
                            <span class="text-danger" id="start_date_error"></span>
                        </div>
                        <div class="col">
                            <input type="time" class="form-control" id="start_time" placeholder="Start Time"
                                name="start_time" required>
                            <span class="text-danger" id="start_time_error"></span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Book Demo</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('bookDemo').addEventListener('click', function() {
        $("#bookDemoModal").modal('show');
    });

    document.querySelector('#bookDemoModal form').addEventListener('submit', function(e) {
        e.preventDefault();

        const url = `{{ route('demo.store') }}`;
        const form = e.target; // Get the form element
        const data = new FormData(form);

        const body = JSON.stringify(Object.fromEntries(data.entries())); // Convert FormData to JSON

        // Clear previous error messages
        document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

        fetch(url, {
            method: 'POST',
            mode: 'cors',
            credentials: 'same-origin',
            cache: 'no-cache',
            redirect: 'follow',
            referrer: 'no-referrer',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body
        })
        .then(response => response.json().then(data => ({status: response.status, body: data})))
        .then(({status, body}) => {
            if (status >= 200 && status < 300) {
                console.log(body);
                // Handle success
            } else {
                if (body.errors) {
                    for (const [field, messages] of Object.entries(body.errors)) {
                        document.getElementById(`${field}_error`).textContent = messages.join(', ');
                    }
                }
                throw new Error(body.message || 'Submission failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error
        });
    });
</script>