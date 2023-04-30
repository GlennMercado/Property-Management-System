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
            <li>{{ date('F j, Y', strtotime($bill->Due_Date)) }} - {{ $bill->Type_of_Bill }} Bill: {{ $bill->Total_Amount }} PHP</li>
        @endforeach
    </ul>
    <p>Regards,</p>
    <p>NOVADECI PROPERTIES</p>
</body>
</html>
