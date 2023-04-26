<!DOCTYPE html>
<html>
<head>
    <title>Tenant Notification</title>
</head>
<body>
    @if($tenant->Tenant_Status == "Ending Contract")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your contract for {{ $tenant->business_name }} will end in today. Please take necessary actions or contact NOVADECI.</p>
        <p>Thank you.</p>
    @else
    <p>Hello {{ $tenant->name_of_owner }},</p>
    <p>Your contract for {{ $tenant->business_name }} will end in two months. Please take necessary actions.</p>
    <p>Thank you.</p>
    @endif
</body>
</html>
