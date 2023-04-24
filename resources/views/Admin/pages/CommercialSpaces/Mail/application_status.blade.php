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
    @elseif($tenant->Status == "Tenant")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Congratulations! You are now one of our tenants.</p>
        <p>Thank you.</p>
    @elseif($tenant->Status == "Passed")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>You have passed the interview.</p>
        <p>Please submit the following to our office: </p>
        <ol>
            <li>Business Registration (DTI/SEC)</li>
            <li>Business Permit (QC LGU)</li>
            <li>BIR Registration</li>
            <li>Fire Insurance Receipt and copy of Policy</li>
            <li>Secondary Licenses per industry, if applicable</li>
        </ol>
        <p>Thank you and have a good day!</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your application status is {{ $tenant->Status }}. Please review the remarks and take necessary actions.</p>
        <p>Thank you.</p>
    @endif
</body>
</html>
