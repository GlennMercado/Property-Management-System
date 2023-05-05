@if($stats2 == "Reserved")
<h3>
    Hello {{ $name->Guest_Name }},
</h3>
<h3>
    Thank you for considering NVDC Suites as your accommodation. We are thrilled to offer you a comfortable and
    memorable experience during your stay.
</h3>
<h3>Check in - 2:00 pm, {{ \Carbon\Carbon::parse($name->Check_In_Date)->format('l, F jS, Y') }}</h3>
<h3>Check out - 12:00 pm, {{ \Carbon\Carbon::parse($name->Check_Out_Date)->format('l, F jS, Y') }}</h3>
<h3>Room no. - {{ $name->Room_No }}</h3>
<h3>Breakfast - Included</h3>
<h3>Number of guest - {{ $name->No_of_Pax }}</h3>
<h3>Booked by - {{ $name->Guest_Name }}, ({{ $name->Email }})</h3>
<h3>Total - PHP{{ number_format($name->Payment, 2, '.', ',') }}</h3>

<h3>Please feel free to contact us if you have any queries or concerns. We are always available to assist you in any way
    possible.</h3>

@else
<h3>
    Hello {{ $name->Guest_Name }},
</h3>
<h3>We regret to inform you that your recent booking request has been declined.</h3>
<h3>We apologize for any inconvenience this may have caused. Please feel free to reach out to us if you have any further questions or would like to inquire about alternative options for your stay.</h3>
<h3>Thank you for considering our services, and we hope to have the opportunity to serve you in the future.</h3>
@endif
<h3>
    Regards,
    <br>
    NVDC Properties.
</h3>
<br><br>
<i>SYSTEM GENERATED EMAIL. DO NOT REPLY</i>