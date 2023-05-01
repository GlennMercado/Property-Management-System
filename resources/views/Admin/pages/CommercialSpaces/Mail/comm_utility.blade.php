<!DOCTYPE html>
<html>
<head>
    <title>Commercial Utility</title>
</head>
<body>
    <p>Good day, {{ $tenant->name_of_owner }}!</p>
    <p>Please be informed that your utility bills for the following billing period:</p>
    <ul>
        @foreach($utility as $bill)
            <li>{{ date('F j, Y', strtotime($bill->Due_Date)) }} - {{ $bill->Type_of_Bill }} Bill: ₱ {{ number_format($bill->Total_Amount, 0, '.', ',') }}.00</li>
        @endforeach
    </ul>
    <p>Regards,<br>NOVADECI PROPERTIES</p>
    <br><br><br>
    <i>SYSTEM GENERATED EMAIL. DO NOT REPLY.</i>
</body>
</html>
