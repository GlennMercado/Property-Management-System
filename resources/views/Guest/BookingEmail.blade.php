<h2>
    Hello {{ auth()->user()->name }}!,
</h2>
<br>
<h2>
    you have booked a hotel reservation.
    Your booking status is currently pending please wait until we processed
    your payment
</h2>
<br>
<br>
<h2>
    Regards,
    {{ config('app.name') }}
</h2>