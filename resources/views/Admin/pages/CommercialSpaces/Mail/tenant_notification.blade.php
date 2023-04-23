<!DOCTYPE html>
<html>
<head>
    <title>Tenant Notification</title>
</head>
<body>
    <p>Hello {{ $tenant->name_of_owner }},</p>
    <p>Your contract for {{ $tenant->business_name }} will end in two months. Please take necessary actions.</p>
    <p>Thank you.</p>
</body>
</html>
