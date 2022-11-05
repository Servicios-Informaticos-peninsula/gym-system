<?php

namespace App\Listeners;

use App\Models\Session;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class SuccessfulLogin
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
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
     {
    //     $ip = request()->ip();
    //    $event->Session::create([
    //         'id'=>10,
    //         'user_id'=>Auth::id(),
    //         'ip_address'=>$ip,
    //         'payload'=> "unknow",
    //         'last_activity'=>"acceso",







    //     ]);

        //dd($event);
    //     $ip = request()->ip();
    //     $event->sessions->user_id = Auth::id();
    //     $event->sessions->ip_address = $ip;
    //     $event->sessions->payload = "payload";
    //     $event->sessions->last_activity = "loggin";
    //     $event->sessions->save();
    //     dd($event);
    }
}
