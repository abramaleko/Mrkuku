<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //This controller is for the web folder where users are not required to be authenticated
    // to view the pages

    public function home(){

        return view('web.index');
    }

    public function investments(){
        return view('web.investments');
    }

    public function learn(){
        return view('web.learn');
    }

    public function contact(){
        return view('web.contact');
    }

    public function saveSubscriber(Request $request)
    {
        if ($request->ajax()) {
            //validate the request
           $request->validate([
               'email' => ['required','unique:subscribers','email']
           ]);

           //save into database
           Subscriber::create([
               'email' => $request->email
           ]);

           return true;
        }
    }

}
