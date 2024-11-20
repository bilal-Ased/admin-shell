<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <a href="{{ route('customers.index') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back to Customers
            </a>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="iq-timeline m-0 d-flex align-items-center justify-content-between position-relative">
                        <ul class="list-inline p-0 m-0 w-100">
                            @if ($appointments->isEmpty())
                            <li>
                                <div class="content text-center">
                                    <h6 class="mb-1">No Appointment History</h6>
                                    <p>The patient has no history of appointments.</p>
                                </div>
                            </li>
                            @else
                            @foreach ($appointments as $appointment)
                            <li>
                                <div class="time">
                                    <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F Y')
                                        }}</span>
                                </div>
                                <div class="content">
                                    <div class="timeline-dots new-timeline-dots"></div>
                                    <h6 class="mb-1">{{ $appointment->comment ?? 'Appointment' }}</h6>
                                    <div class="d-inline-block w-100">
                                        <p>
                                            <strong>Date:</strong> {{
                                            \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                            <br>
                                            <strong>Time:</strong> {{
                                            \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                            <br>
                                            <strong>Status:</strong> {{ $appointment->status_id }} <br>
                                            <!-- Translate this ID to a status name -->
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>