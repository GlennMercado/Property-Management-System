<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment', 'start_time', 'end_time', 'start_date',
        'end_date', 'event_type', 'facility', 'client_name',
        'contact_number', 'num_of_guest'
    ];
}
