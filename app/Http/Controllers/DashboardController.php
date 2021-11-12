<?php

namespace App\Http\Controllers;

use App\Notifications\AddPhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        //notifications dispatch
        $counter=0;

        if (! (Auth::user()->phone_no)) {

           if (count(Auth::user()->unreadNotifications) == 0)
                Auth::user()->notify(new AddPhoneNumber(Auth::user()->name));
           else
           {
            foreach (Auth::user()->unreadNotifications as $notification) {
                if ($notification->type == "App\Notifications\AddPhoneNumber") {
                    $counter=+1;
                }
            }
            if ($counter == 0) {
                Auth::user()->notify(new AddPhoneNumber(Auth::user()->name));
            }
           }


        }

        return view('dashboard');

    }
}
