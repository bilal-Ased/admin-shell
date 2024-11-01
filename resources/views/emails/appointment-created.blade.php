@component('mail::message')
# New Appointment Created

Dear {{ $appointment->user->username }},

A new appointment has been created for the customer {{ $appointment->customer->first_name }}.

**Details:**
- **Appointment Date and Time:** {{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('F j, Y g:i A') }}

Best regards,<br>
{{ config('app.name') }}<br>
{{ config('app.url') }}

@endcomponent