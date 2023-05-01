<!DOCTYPE html>
<html>
<head>
    <title>Commercial Space Maintenance</title>
</head>
<body>
    <p>Hello {{ $tenant->name_of_owner }},</p>
    <p>Your unit is under maintenance. Below here is your Maintenance cost together with Equipments Used:</p>
    <p>Reason for Maintenance : {{$reason}}</p>
    <p>Equipments : {{$others}}</p>
    <p>Cost : ₱ {{number_format($cost, 0, '.', ',')}}.00</p>
    <p>Regards,<br>NOVADECI PROPERTIES</p>
</body>
</html>
