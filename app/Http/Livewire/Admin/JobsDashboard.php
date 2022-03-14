<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jobs;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class JobsDashboard extends Component
{

    public $selectedJobDetails;

    public function selectJob($job)
    {
      $this->selectedJobDetails=$job;
    }

   public function resetSelected ()
   {
       $this->reset('selectedJobDetails');
   }

    public function closeJob(Jobs $job)
    {
        $job->available=false;
        $job->save();

        $this->selectedJobDetails=$job->toArray();
    }
    public function activateJob(Jobs $job)
    {
        $job->available=true;
        $job->save();

        $this->selectedJobDetails=$job->toArray();
    }

    public function deleteJob(Jobs $job)
    {
      $applicants=$job->applicants;
      foreach ($applicants as $applicant) {
          $path=unserialize($applicant->cv_attachments);
         Storage::delete($path);
      }
       $job->delete();

       return redirect()->route('jobDashboard');

    }


    public function render()
    {
          //if user does not have the permissions
          if (! auth()->user()->can('manage jobs')) {
            abort(403, 'Unauthorized.');
        }

        if (!$this->selectedJobDetails) {
            return view('livewire.admin.jobs-dashboard',[
                'jobs' => Jobs::orderBy('id','desc')->paginate(15)
            ]);
        }
        else{
            return view('livewire.admin.jobs-dashboard');
        }

    }
}
