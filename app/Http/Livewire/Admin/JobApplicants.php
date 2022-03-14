<?php

namespace App\Http\Livewire\Admin;

use App\Models\Applications;
use Illuminate\Support\Facades\Storage;


use App\Models\Jobs;
use Livewire\Component;
use ZipArchive;



class JobApplicants extends Component
{
    public $job,$applicantDetails;

   public function mount(Jobs $job)
   {
       $this->job=$job;
   }

   public function selectApplicant(Applications $applicant)
   {
     $this->applicantDetails=$applicant;
   }
   public function resetSelected()
   {
       $this->reset('applicantDetails');
   }

   public function deleteApplication(Applications $applicant)
   {
        //deletes the files
        $filepaths=unserialize($applicant->cv_attachments);
        foreach ($filepaths as $path) {
            Storage::delete($path);
        }

    //    //deletes the model data
       $applicant->delete();

       return redirect()->route('jobApplicants',$this->job->id);

   }

   public function shortlistApplicant()
   {
       $this->applicantDetails->shortlisted=true;
       $this->applicantDetails->save();
   }
   public function UnshortlistApplicant()
   {
       $this->applicantDetails->shortlisted=false;
       $this->applicantDetails->save();
   }

   public function downloadFiles(){
    $files=unserialize($this->applicantDetails->cv_attachments);

	// Define Dir Folder
    $dir=storage_path('app/public/zipped');
    //zip file name
    $zipFileName=$this->applicantDetails->user->name.' cv files.zip';
    // Create ZipArchive Obj
    $zip = new ZipArchive;
    if ($zip->open($dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
        // Add File in ZipArchive
        $n=1;
        foreach ($files as $file) {
         $zip->addFile(storage_path('app/'.$file),'attachment'.$n++);
        }
        // Close ZipArchive
        $zip->close();
    }
       // Set Header
       $headers = array(
        'Content-Type' => 'application/octet-stream',
    );
    $filetopath=$dir.'/'.$zipFileName;
    // Create Download Response
    if(file_exists($filetopath)){
        return response()->download($filetopath,$zipFileName,$headers);
    }


   }

    public function render()
    {
         //if user does not have the permissions
         if (! auth()->user()->can('manage jobs')) {
            abort(403, 'Unauthorized.');
        }

        return view('livewire.admin.job-applicants',[
            'job' => $this->job,
             'applicants'=> Applications::where('job_id',$this->job->id)->paginate(10)
        ]);
    }
}
