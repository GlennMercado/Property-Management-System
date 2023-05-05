<!DOCTYPE html>
<html>
<head>
    <title>Application Status</title>
</head>
<body>
    @if($tenant->Status == "Disapproved")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your application is not approved.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Status == "Failed")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>You have failed the interview.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Status == "Tenant")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Congratulations! You are now one of our tenants.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
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
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Status == "Approved")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your commercial space application has been {{ $tenant->Status }}. Kindly log-in in our site ({{url('/')}}) and set your interview date.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Status == "For Revision")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>We hae reviewed your submitted documents. Your commercial space application has been tagged as {{ $tenant->Status }}.</p>
        <p>We advised you to comply with your requirements.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @elseif($tenant->Status == "For Approval")
        <p>Hello {{ $tenant->name_of_owner }},</p>
        <p>Your Commercial Space Application has been submitted successfully. Please wait for admin approval.</p>
        <p>Regards,<br>NOVADECI PROPERTIES</p>
    @endif
    <br><br><br>
    <i>SYSTEM GENERATED EMAIL. DO NOT REPLY.</i>
</body>
</html>
