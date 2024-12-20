<p>Hello {{ $customer->name }},</p>

<p>You have are booked for a demo on the following dates below:</p>

<p>Email: {{ $demo->date }}</p>
<p>Password: {{ $demo->time }}</p>

<p>Click the following link to change to another date: {{ route('login') }}</p>

<p>Thank you!</p>