<!DOCTYPE html>
<html>
<head>
    <title>Application Status</title>
</head>
<body>
    @if($tenant->Status == "Disapproved")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your application is not approved.</p>
        <p>Thank you.</p>
    @elseif($tenant->Status == "Failed")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>You have failed the interview.</p>
        <p>Thank you.</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your application status is {{ $tenant->Status }}. Please review the remarks and take necessary actions.</p>
        <p>Thank you.</p>
    @endif
</body>
</html>
