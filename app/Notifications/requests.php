<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;


class requests extends Notification
{
    use Queueable;
    public $trip_user;
    public $user_id;
    public $test;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($trip_user , $id , $test)
    {
        $this->trip_user = $trip_user;
        $this->user_id = $id;
        $this->test = $test;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }


    public function toDatabase($notifiable)
    {
        if($this->test == 'true')
        {


            return [

                'trip_user'=> $this->trip_user, 
                'user_id'=>$this->user_id,
                'test'=>$this->test
                
            ];

        }  
        else{
                return[

                'trip_user'=> $this->trip_user, 
                'user_id'=>$this->user_id,
                'test'=>$this->test
                

                ];
        }

       
    }
    
  
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
