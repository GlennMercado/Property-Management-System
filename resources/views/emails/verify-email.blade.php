<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email Address</title>
</head>
<body>
    <h2>Verify Your Email Address</h2>
    <p>Hello {{ $user->name }},</p>
    <p>Thank you for registering on our website. To complete your registration, please click the following link:</p>
    <p><a href="{{ url('verify-email/'.$token) }}">{{ url('verify-email/'.$token) }}</a></p>
    <p>If you did not register on our website, please ignore this email.</p>
    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
