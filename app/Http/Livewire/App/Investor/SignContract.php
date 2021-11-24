<?php

namespace App\Http\Livewire\App\Investor;

use App\Models\BankInfo;
use App\Models\Contracts;
use App\Models\NextOfKin;
use Carbon\Carbon;
use Livewire\Component;


class SignContract extends Component
{
     public $bank_name,$account_name,$account_no,$roi_period;

     public $name,$residence,$relationship,$email,$phone_no;

     public $contract;

    public function mount( Contracts $contract)
    {
      //execute to not show if details have been signed
      $this->contract=$contract;
    }


    protected $rules=[
        'roi_period' => 'required',
        'bank_name' =>  'required|string',
        'account_name' => 'required|string',
        'account_no'   => 'required|string',
        'name'  => 'required|string',
        'residence' =>  'required|string',
        'relationship' => 'required|string',
        'email' => 'required|email',
        'phone_no'  => 'required'
    ];

    public function submit()
    {
        $start_date=Carbon::parse($this->contract->start_date);

        //validates the form
        $this->validate();

        $next_of_kin=NextOfKin::create([
            'name' => $this->name,
             'residence_location' => $this->residence,
             'relationship' => $this->relationship,
             'email' => $this->email,
             'phone_no' => $this->phone_no,
        ]);

        $bank_info=BankInfo::create([
            'name' => $this->bank_name,
            'account_name' => $this->account_name,
            'account_number' => $this->account_no,
        ]);


        $this->contract->ROI_period=$this->roi_period;
        $this->contract->next_ROI=$start_date->addMonths($this->roi_period);
        $this->contract->next_of_kin_id=$next_of_kin->id;
        $this->contract->bank_info_id=$bank_info->id;

        $this->contract->save();

        return redirect()->route('investor.myInvestments');

    }

    public function render()
    {
        return view('livewire.app.investor.sign-contract');
    }
}
