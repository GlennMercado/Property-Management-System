<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel_reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'Reservation_No','Guest_Name',
        'Check_In_Date', 'Check_Out_Date', 
        'Mobile_Num', 'Email',
        'Room_No', 'No_of_Pax',
        'Payment_Status', 'Booking_Status'
    ];
}
