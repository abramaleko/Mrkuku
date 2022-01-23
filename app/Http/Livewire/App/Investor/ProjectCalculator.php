<?php

namespace App\Http\Livewire\App\Investor;

use App\Models\Projects;

use Livewire\Component;

class ProjectCalculator extends Component
{
    public $listeners= ['addToInvestment'];

    public $projectChoice;

    public $calculateRearing = false,$calculateCorn=false;
    public $projects;

   public function mount()
   {
       $this->projects=Projects::all();
   }

    public function updatedProjectChoice()
    {
        switch ($this->projectChoice) {
            case '1':
                $this->calculateRearing = true;
                $this->calculateCorn=false;
                break;

            case '2':
                $this->calculateCorn=true;
                $this->calculateRearing = false;
                break;
        }
    }


    public function render()
    {
        return view('livewire.app.investor.project-calculator');
    }
}
