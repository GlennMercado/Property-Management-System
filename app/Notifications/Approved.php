<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use App\Models\hotel_reservations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Approved extends Notification
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
    public function toArray($notifiable)
    {
        $link = "http://localhost:8000/my_bookings";
        $email = Auth::user()->email;
        $notif = "You have booked successfully, your payment was approved.";
        return [
            'user_id'=>$this->user['id'],
            'name'=>$this->user['name'],
            'email'=>$this->user['email'],
            'txt'=>$notif,
            'link'=>$link,
        ];
    }
}
