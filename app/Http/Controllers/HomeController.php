<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //This controller is for the web folder where users are not required to be authenticated
    // to view the pages

    public function home(){
        $blog=Blog::latest()->take(3)->get();

        return view('web.index',[
            'blog_posts' => $blog,
        ]);
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

    public function uploadContactMessage(Request $request)
    {

         $request->validate([
             'name' =>'required|string',
             'email'=> 'required|email',
             'phone_no'=> 'required|numeric',
             'context' => 'required|string|max:500',
             "_token" => 'required',
         ]);

         $message=new Contact();
         $message->name=$request->name;
         $message->email=$request->email;
         $message->phone_no=$request->phone_no;
         $message->context=$request->context;
         //if user is loged in
         if (Auth::check()) {
            $message->user_type='Investor';
         }

         $message->save();

         $request->session()->flash('success', 'Thanks for reaching out to us, our team  will contact you shortly');

         return back();

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
