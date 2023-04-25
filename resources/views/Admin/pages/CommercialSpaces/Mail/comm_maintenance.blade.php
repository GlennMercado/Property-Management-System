<!DOCTYPE html>
<html>
<head>
    <title>Commercial Space Maintenance</title>
</head>
<body>
    @if($cost != null)
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We would like to inform you that your unit is under maintenance. The cost is {{$cost}} php.</p>
        <p>Please meet us in our office for further details.</p>
        <p>Thank you!</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We would like to inform you that your unit is under maintenance.</p>
        <p>Please meet us in our office for further details.</p>
        <p>Thank you!</p>
    @endif
</body>
</html>
