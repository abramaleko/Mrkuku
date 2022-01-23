<?php

namespace App\Http\Livewire\App\Investor;

use App\Models\Investments;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CornCalculator extends Component
{

      public $acres;

      public $farm_rent,$farm_inputs,$supervision,$grand_total,$seasonal_returns;

      public $calculatedAmount=false;


      public function calculateAmount()
      {
          $this->farm_rent= $this->acres * 1020000;
          $this->farm_inputs= $this->acres *135000;
          $this->supervision=$this->acres * 120000;

          $this->grand_total = $this->farm_rent + $this->farm_inputs + $this->supervision;

          $this->seasonal_returns= $this->acres * 1250000;

         return  $this->calculatedAmount=true;

      }

      public function resetAcres()
      {
          $this->reset('acres');

          return $this->calculatedAmount=false;
      }

      public function addToInvestment()
      {
         Investments::create(
             [
                 'project_id' => 2,
                 'user_id' => Auth::id(),
                 'amount' => $this->grand_total,
                 'units' => $this->acres,
              ]
         );

         return redirect()->route('investor.myInvestments');
      }


    public function render()
    {
        return view('livewire.app.investor.corn-calculator');
    }
}
