<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\User;
use Carbon\Carbon;

class repliedToThread extends Notification
{
    use Queueable;
    public $trip;
    public $user;
    public function __construct($trip,$user)
    {
        $this->trip = $trip;
        $this->user = $user;

    }

    public function via($Notifiable)
    {
        return ['database','broadcast'];
    }
    public function toDatabase($Notifiable)
    {
        return [
            'trip'=>$this->trip,
            'user'=>$this->user
        ];
    }

        public function toBroadcast($Notifiable)
        {
            return new BroadcastMessage([
                'trip'=>$this->trip,
                'user'=>$this->user
            ]);
        }

    public function toArray($Notifiable)
    {
        return [
            //
        ];
    }
}
