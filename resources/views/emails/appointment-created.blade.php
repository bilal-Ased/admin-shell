@component('mail::message')
# New Appointment Created


Dear {{ $appointment->user->username }},

A new appointment has been created for the customer {{ $appointment->customer->first_name }}.

**Details:**
- **Appointment Date and Time:** {{ $appointment->appointment_datetime }}
- **Reason:** {{ $appointment->reason ?: 'Not specified' }}



Best regards,<br>
Your Application Name
@endcomponent
