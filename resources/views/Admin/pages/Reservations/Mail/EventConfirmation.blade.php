<!DOCTYPE html>
<html>
<head>
    <title>Convention Center Application</title>
</head>
<body>
    @if($client->inquiry_status == "Approved")
    <p>Hello {{ $client->client_name }},</p>
    <p>Your inquiry has been granted approval, and you may visit NVDC Properties to present this email as confirmation.</p>
    <p>Regards,<br>NOVADECI PROPERTIES</p>
    @else
        <p>Hello {{ $client->client_name }},</p>
        <p>We regret to inform you that your event inquiry was denied. Please feel free to submit another inquiry.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @endif
    <br><br><br>
    <i>SYSTEM GENERATED EMAIL. DO NOT REPLY.</i>
</body>
</html>
