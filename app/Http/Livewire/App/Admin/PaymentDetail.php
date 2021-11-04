<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Investments;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use File;
use Illuminate\Support\Facades\Auth;

class PaymentDetail extends Component
{
    public $investment,$slips=[];

    public $verifySlip=false, $declineSlip=false;

    public $reasonDecline;

   public function mount(Investments $investment)
   {
      $this->investment=$investment;
      $this->slips=unserialize($this->investment->invoice->verification_attachments);

   }


   public function declineSlip()
   {
       $this->validate([
           'reasonDecline' => 'required',
       ]);

       $this->investment->invoice->verification_error=$this->reasonDecline;
       $this->investment->invoice->save();

       //clears the input
       $this->reasonDecline='';

       return session()->flash('message', 'Successfully declined');

   }

  public function downloadSlip($path)
  {
    return response()->download(storage_path('app/'.$path));
  }

  public function VerifySlipFunction()
  {
      //verifies the investment table with verified true and investment status to active.
      $this->investment->verified=true;
      $this->investment->status=1;

      $this->investment->invoice->verified=true;
      $this->investment->invoice->verified_by=Auth::id();

      $this->investment->save();
      $this->investment->invoice->save();


      return redirect()->route('admin.verification-center');

  }

    public function render()
    {
        return view('livewire.app.admin.payment-detail');
    }
}
