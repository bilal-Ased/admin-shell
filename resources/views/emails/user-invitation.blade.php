<p>Hello {{ $user->name }},</p>

<p>You have been invited to log in. Here are your credentials:</p>

<p>Email: {{ $user->email }}</p>
<p>Password: {{ $password }}</p>

<p>Click the following link to log in: {{ route('login') }}</p>

<p>Thank you!</p>
