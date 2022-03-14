<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jobs;
use Livewire\Component;

class NewJob extends Component
{
  public $title,$description,$application_deadline;

    protected $rules=[
        'title' => 'required|string',
        'description' => 'required|string',
        'application_deadline' => 'required|date',
    ];


    public function createJob()
    {
        $this->validate();

        $job=new Jobs();
        $job->job_title=$this->title;
        $job->description=$this->description;
        $job->application_deadline=$this->application_deadline;
        $job->available=true;
        $job->save();

        return redirect()->route('jobDashboard');

    }

    public function render()
    {
          //if user does not have the permissions
          if (! auth()->user()->can('manage jobs')) {
            abort(403, 'Unauthorized.');
        }

        return view('livewire.admin.new-job');
    }
}
