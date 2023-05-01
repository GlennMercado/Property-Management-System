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

<h3>
    Regards,
    <br>
    NVDC Properties.
</h3>
