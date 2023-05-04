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

class Declined extends Notification
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
        $link = "my_bookings";
        $email = Auth::user()->email;
        $notif = "We regret to inform you that your payment was unsuccessful. Please make another booking and ensure that you enter a valid reference number. Thank you for your cooperation.";
        return [
            'user_id'=>$this->user['id'],
            'name'=>$this->user['name'],
            'email'=>$this->user['email'],
            'txt'=>$notif,
            'link'=>$link,
        ];
    }
}
