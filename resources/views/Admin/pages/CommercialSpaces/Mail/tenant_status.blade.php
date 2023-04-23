<!DOCTYPE html>
<html>
<head>
    <title>Tenant Status</title>
</head>
<body>
    @if($tenant->Tenant_Status != "Active (Operating)")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your status is {{ $tenant->Tenant_Status }}. Please review the remarks and take necessary actions.</p>
        <p>Thank you.</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your status is {{ $tenant->Tenant_Status }}.</p>
        <p>Thank you for complying.</p>
    @endif
</body>
</html>
