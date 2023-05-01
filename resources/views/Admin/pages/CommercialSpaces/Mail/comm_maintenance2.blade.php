<!DOCTYPE html>
<html>
<head>
    <title>Commercial Space Maintenance</title>
</head>
<body>
    @if($status == "Paid")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We would like to inform you that your unit maintenance payment has been checked.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We would like to inform you that your unit maintenance payment is incorrect.</p>
        <p>Please upload the proper image</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @endif
</body>
</html>
