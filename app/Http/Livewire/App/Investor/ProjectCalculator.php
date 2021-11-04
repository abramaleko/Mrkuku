<?php

namespace App\Http\Livewire\App\Investor;

use App\Models\Investments;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectCalculator extends Component
{
    public $projectChoice;

    //variables for chick calculations
    public $doc, $food, $management, $risk, $capital, $package, $return1, $return2;
    public $showChickCalcu = false, $calculatedChicks = false;
    public $chicksNo,$investmentCapital;
    public $PerInvestmentCalcu=false,$showChickCalcuMethod=false,$ChickCalcuMethod,$calculatedCapital=false;
    public $projects;

   public function mount()
   {
       $this->projects=Projects::all();
   }

    public function updatedProjectChoice()
    {
        switch ($this->projectChoice) {
            case '1':
                $this->showChickCalcuMethod = true;
                break;

            default:
                # code...
                break;
        }
    }

    public function updatedChickCalcuMethod()
    {
        switch ($this->ChickCalcuMethod) {
            case '1':
                $this->PerInvestmentCalcu = true;
                $this->showChickCalcu = false;

                $this->calculatedChicks = false;
                $this->calculatedCapital = false;


                break;
                case 2:
                $this->showChickCalcu = true;
                $this->PerInvestmentCalcu = false;

                $this->calculatedChicks = false;
                $this->calculatedCapital = false;

                break;

        }
    }


    public function calculateChicks()
    {
        //calculate the investment amount needed
        $this->doc = 1500 * $this->chicksNo;

        $this->food = 2700 * $this->chicksNo;

        $this->management = 800 * $this->chicksNo;

        $this->risk = (0.1 * $this->chicksNo) * 1500;

        $this->capital = ($this->doc) + ($this->food) + ($this->management) + ($this->risk);

        /*calculate the which package will the investment be
        1=Gold 2=Diamond 3=Tanzanite
       */

        if (($this->chicksNo >= 100) && ($this->chicksNo <= 999)) {
            $this->package = 1;
        } elseif (($this->chicksNo >= 1000) && ($this->chicksNo <= 1999)) {
            $this->package = 2;
        } elseif (($this->chicksNo >= 2000)) {
            $this->package = 3;
        }

        //calculate returns

        /*fixed profit of 500 per chick
           sub_profit1 is for return in 6 months
           sub_profit2 is for return in 12 months + risk money
       */
        $sub_profit1 = (500 * $this->chicksNo) * 6;
        $sub_profit2 = (500 * $this->chicksNo) * 12;

        /*calculate bonuses depending on package
         1=Gold
         2=Diamond
         3=Tanzanite
         $return1 =returns in six months
         $return2 =returns in 12 months

       */


        switch ($this->package) {
            case 1:
                $this->return1 = (0.3 * $sub_profit1) + $sub_profit1;
                $this->return2 = (0.4 * $sub_profit2) + $sub_profit2 + $this->risk;
                break;
            case 2:
                $this->return1 = (0.4 * $sub_profit1) + $sub_profit1;
                $this->return2 = (0.6 * $sub_profit2) + $sub_profit2 + $this->risk;
                break;
            case 3:
                $this->return1 = (0.5 * $sub_profit1) + $sub_profit1;
                $this->return2 = (0.8 * $sub_profit2) + $sub_profit2 + $this->risk;
                break;

        }

        $this->calculatedChicks = true;
    }

    public function calculateCapital()
    {
        $this->chicksNo=round($this->investmentCapital / 5000,0,PHP_ROUND_HALF_UP);

        $this->calculateChicks();

        $this->calculatedCapital=true;
    }


    public function resetChicksNo()
    {
        unset($this->chicksNo);
        $this->calculatedChicks = false;
    }

    public function resetinvestmentCapital()
    {
        unset($this->investmentCapital);
        $this->calculatedCapital = false;
    }

    public function addToInvestment()
    {
       Investments::create(
           [
               'project_id' => $this->projectChoice,
               'user_id' => Auth::id(),
               'amount' => $this->capital,
               //to be changed when a new project is introduced
               'units' => $this->chicksNo,
            ]
       );

       return redirect()->route('investor.myInvestments');
    }


    public function render()
    {
        return view('livewire.app.investor.project-calculator');
    }
}
