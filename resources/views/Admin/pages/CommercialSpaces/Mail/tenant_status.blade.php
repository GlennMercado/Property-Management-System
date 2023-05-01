<!DOCTYPE html>
<html>
<head>
    <title>Tenant Status</title>
</head>
<body>
    @if($tenant->Tenant_Status == "Active (Operating)")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your status is {{ $tenant->Tenant_Status }}.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Tenant_Status == "For Renewal")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>You have renewed your lease.</p>
        <p>Please re:submit the following to our office: </p>
        <ol>
            <li>Business Registration (DTI/SEC)</li>
            <li>Business Permit (QC LGU)</li>
            <li>BIR Registration</li>
            <li>Fire Insurance Receipt and copy of Policy</li>
            <li>Secondary Licenses per industry, if applicable</li>
        </ol>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Tenant_Status == "Terminated")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We are sorry to inform you that your . Please review the remarks and take necessary actions.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @else
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your status is {{ $tenant->Tenant_Status }}. Please review the remarks and take necessary actions.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @endif
    <br><br><br>
    <i>SYSTEM GENERATED EMAIL. DO NOT REPLY.</i>
</body>
</html>
