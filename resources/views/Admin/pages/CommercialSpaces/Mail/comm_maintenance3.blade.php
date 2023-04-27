<!DOCTYPE html>
<html>
<head>
    <title>Commercial Space Maintenance</title>
</head>
<body>
    <p>Hello {{ $tenant->name_of_owner }},</p>
    <p>Your unit is under maintenance. Below here is your Maintenance cost together with Equipments Used:</p>
    <p>Equipments : {{$others}}</p>
    <p>Cost : {{$cost}} PHP</p>
    <p>Thank you,</p>
    <p>NOVADECI Properties</p>
</body>
</html>
