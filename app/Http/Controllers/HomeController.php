<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Contact;
use App\Models\Jobs;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function careers()
    {
        return view('web.careers',[
            'jobs' => DB::table('jobs')->orderBy('id','desc')->simplePaginate(10)
        ]);
    }

    public function jobDescription(Jobs $job)
    {
        return view('web.job-description',[
            'job' =>$job,
        ]);
    }

    public function jobApplication(Jobs $job)
    {
        if ($job->available) {
            return view('web.job-application',[
                'user' => Auth::user(),
                'job' => $job,
            ]);
        } else {
            abort(403, 'Unauthorized.');
        }


    }

   public function submitApplication(Request $request)
   {
      //for storing attachments
      $filepaths=[];

       $request->validate([
           'user_id' => 'required',
            'cover_letter' => 'required|string',
            'cv_attachments' => 'required|max:5',
            'cv_attachments.*' => 'mimes:pdf|max:4096',
       ]);

       foreach ($request->file('cv_attachments') as $file) {
        $path = Storage::putFile('cv_attachments', $file);
        array_push($filepaths, $path);
       }

       $applicant=new Applications();
       $applicant->applicant_id=$request->user_id;
       $applicant->job_id=$request->job_id;
       $applicant->cover_letter=$request->cover_letter;
       $applicant->cv_attachments=serialize($filepaths);
       $applicant->save();

       return redirect()->back()->with('success','Thank you for submitting your application you will be soon notified if you have been selected');

   }

}
