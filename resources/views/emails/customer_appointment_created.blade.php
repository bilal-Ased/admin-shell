@component('mail::message')
# Your Appointment Details

Dear {{ $appointment->customer->first_name }} {{ $appointment->customer->last_name }},

Thank you for scheduling an appointment with us. Here are your appointment details:

**Details:**
- **Appointment Date and Time:** {{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('F j, Y g:i A') }}
- **Location:** Sarit Center 4th Floor

If you have any questions or need to reschedule, please feel free to contact us.

Best regards,<br>
{{ config('app.name') }}<br>
{{ config('app.url') }}
@endcomponent