<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
