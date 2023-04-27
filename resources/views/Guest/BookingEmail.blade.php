<h2>
    Hello {{ auth()->user()->name }}!,
</h2>
<h2>
    "Your booking status is currently pending. Please wait until we have processed your payment."
</h2>
<h2>
    Regards,
    <br>
    {{ config('app.name') }}
</h2>
