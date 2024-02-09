<!-- resources/views/doctor_schedules/create.blade.php -->

@section('content')
    <h1>Create Doctor Schedule</h1>

    <form action="{{ route('doctor-schedules.store') }}" method="POST">
        @csrf

        @foreach ($daysOfWeek as $key => $day)
            <div class="form-group">
                <label for="start_time_{{ $key }}">Start Time for {{ $day }}</label>
                <input type="time" name="schedule[{{ $key }}][start_time]" id="start_time_{{ $key }}"
                    class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_time_{{ $key }}">End Time for {{ $day }}</label>
                <input type="time" name="schedule[{{ $key }}][end_time]" id="end_time_{{ $key }}"
                    class="form-control" required>
            </div>
        @endforeach

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="" disabled selected>Select a Doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add other form fields as needed -->

        <button type="submit" class="btn btn-primary">Save Schedule</button>
    </form>
@endsection
