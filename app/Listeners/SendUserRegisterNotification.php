<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Database\Seeders\PostSeeder;

class SendUserRegisterNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $seeder = new PostSeeder;
        $seeder->run($event->user->id);
    }
}
