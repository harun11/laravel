<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
      $user=$event->user_name;
      $email=$user->user_email;
      Mail::send('prijava.pr', ['name'=>$user],function($poruka){
        $poruka=from('admin@nesto.com','Admin');
        $poruka=to($email,$user);
        $poruka=subject('Hvala za vaš post!');
      });
    }
}
