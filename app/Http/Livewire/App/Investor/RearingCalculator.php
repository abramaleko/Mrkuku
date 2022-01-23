<?php

namespace App\Http\Livewire\App\Investor;
use App\Models\Settings;
use App\Models\Investments;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class RearingCalculator extends Component
{
      //variables for chick calculations
      public $doc, $food, $management, $risk, $capital, $package,$bonus,$bonus0, $bonus1, $bonus2,$sub_profit0,$sub_profit1,$sub_profit2;

      public $chicksNo,$investmentCapital;
      public $PerInvestmentCalcu=false,$showChickCalcu=false,$ChickCalcuMethod;
      public $calculatedCapital=false,$calculatedChicks=false;



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

        //check for bonuses if available for the project
        $this->bonus=Settings::where('setting','Bonuses')->
                     select('value')->first()->value;


        //calculate returns

        /*fixed profit of 500 per chick
           sub_profit0 is for return in 3 months
           sub_profit1 is for return in 6 months
           sub_profit2 is for return in 12 months
       */
        $this->sub_profit0= (500 * $this->chicksNo) * 3;
        $this->sub_profit1 = (500 * $this->chicksNo) * 6;
        $this->sub_profit2 = (500 * $this->chicksNo) * 12;

        /*calculate bonuses depending on package
         1=Gold
         2=Diamond
         3=Tanzanite
         $bonus0 =bonus in 3 months
         $bonus2 =bonus in six months
         $bonus3 =bonus in 12 months

       */


        switch ($this->package) {
            case 1:
                if ($this->bonus === 'true') {
                    //get the bonus values from database
                    $bonus_returns=json_decode(Settings::where('setting','Roi_Gold')
                    ->select('value')
                    ->first()
                    ->value);

                    $this->bonus0= ( (intval($bonus_returns[0]) / 100) * $this->sub_profit0 );
                    $this->bonus1= ( (intval($bonus_returns[1]) / 100) * $this->sub_profit1 );
                    $this->bonus2= ( (intval($bonus_returns[2]) / 100) * $this->sub_profit2 );
                }
                break;
            case 2:
                if ($this->bonus === 'true') {
                    //get the bonus values from database
                    $bonus_returns=json_decode(Settings::where('setting','Roi_Diamond')
                    ->select('value')
                    ->first()
                    ->value);

                    $this->bonus0= ( (intval($bonus_returns[0]) / 100) * $this->sub_profit0 );
                    $this->bonus1= ( (intval($bonus_returns[1]) / 100) * $this->sub_profit1 );
                    $this->bonus2= ( (intval($bonus_returns[2]) / 100) * $this->sub_profit2 );
                }
                break;
            case 3:
                if ($this->bonus === 'true') {
                    //get the bonus values from database
                    $bonus_returns=json_decode(Settings::where('setting','Roi_Tanzanite')
                    ->select('value')
                    ->first()
                    ->value);

                    $this->bonus0= ( (intval($bonus_returns[0]) / 100) * $this->sub_profit0 );
                    $this->bonus1= ( (intval($bonus_returns[1]) / 100) * $this->sub_profit1 );
                    $this->bonus2= ( (intval($bonus_returns[2]) / 100) * $this->sub_profit2 );
                }
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
               'project_id' => 1,
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
        return view('livewire.app.investor.rearing-calculator');
    }
}
