<h3>User Schedule Management</h3>

<!-- Weekly Schedule Form -->
<form action="{{ route('userSchedule.store') }}" method="POST">
    @csrf
    <label for="user">Select User:</label>
    <select name="user_id" id="user" required>
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <h5>Set Weekly Schedule</h5>
    <label for="day">Day of the Week:</label>
    <select name="day" id="day" required>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>

    <label for="start_time">Start Time:</label>
    <input type="time" name="start_time" required>

    <label for="end_time">End Time:</label>
    <input type="time" name="end_time" required>

    <input type="hidden" name="is_available" value="1"> <!-- Indicates availability -->

    <button type="submit">Save Weekly Schedule</button>
</form>

<br><br>

<!-- Exception Form -->
<form action="{{ route('userSchedule.store') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" id="exception_user_id" value="" required> <!-- Populated by JavaScript -->

    <h5>Set One-Time Exception</h5>
    <label for="exception_date">Exception Date:</label>
    <input type="date" name="exception_date" id="exception_date" required>

    <label for="exception_start_time">Unavailable Start Time:</label>
    <input type="time" name="start_time" id="exception_start_time" required>

    <label for="exception_end_time">Unavailable End Time:</label>
    <input type="time" name="end_time" id="exception_end_time" required>

    <input type="hidden" name="is_available" value="0"> <!-- Indicates unavailability -->

    <button type="submit">Save Exception</button>
</form>

<script>
    // Sync selected user ID from the weekly schedule form to the exception form
    document.getElementById('user').addEventListener('change', function() {
        document.getElementById('exception_user_id').value = this.value;
    });
</script>