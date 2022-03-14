<?php

namespace App\Http\Livewire\Admin;

use App\Models\Applications;
use Illuminate\Support\Facades\Storage;

use App\Models\Jobs;
use Livewire\Component;

class ShortListed extends Component
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

    public function render()
    {
        //if user does not have the permissions
       if (! auth()->user()->can('manage jobs')) {
                abort(403, 'Unauthorized.');
      }

        return view('livewire.admin.short-listed',[
            'applicants' => Applications::where('job_id',$this->job->id)
                            ->where('shortlisted',true)
                            ->paginate(10),
        ]);
    }
}
