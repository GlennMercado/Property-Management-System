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
    @elseif($status == "Security Deposit")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We would like to inform you that we deducted the total cost of the maintenance of your unit from your Security Deposit.</p>
        <p>Please login and check the details in our website ({{url('/')}})</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We would like to inform you that your unit maintenance payment is incorrect.</p>
        <p>Please upload the proper image</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @endif
    <br><br><br>
    <i>SYSTEM GENERATED EMAIL. DO NOT REPLY.</i>
</body>
</html>
