<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Contracts;
use App\Models\Investments;
use App\Notifications\ContractSigning;
use App\Notifications\slipsDeclined;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class PaymentDetail extends Component
{
    public $investment, $slips = [];

    public $verifySlip = false, $declineSlip = false;

    public $reasonDecline, $payment_date;

    public function mount(Investments $investment)
    {
        $this->investment = $investment;
        $this->slips = unserialize($this->investment->invoice->verification_attachments);
    }


    public function declineSlip()
    {
        $this->validate([
            'reasonDecline' => 'required',
        ]);

        //clears the verification attachments which are declined
        $paths = unserialize($this->investment->invoice->verification_attachments);

        Storage::delete($paths);

        $this->investment->invoice->verification_attachments = '';

        $this->investment->invoice->verification_error = $this->reasonDecline;
        $this->investment->invoice->save();

        //clears the input
        $this->reasonDecline = '';

        $this->investment->user->notify(new slipsDeclined($this->investment->invoice->id));


        return session()->flash('message', 'Successfully declined');
    }

    public function downloadSlip($path)
    {
        return response()->download(storage_path('app/' . $path));
    }

    public function VerifySlipFunction()
    {
        $this->validate([
            'payment_date' => 'required|date',
        ]);

        //Create a new contract record
        $contract = Contracts::create([
            'investor_id' => $this->investment->user_id,
            'project_id' => $this->investment->project_id,
            'amount'  =>  $this->investment->amount,
            'start_date' => Carbon::now()->toDateString(),

        ]);

        //verifies the investment table with verified true and investment status to active.
        $this->investment->verified = true;
        $this->investment->status = 1;
        $this->investment->contract_id = $contract->id;

        $this->investment->invoice->verified = true;
        $this->investment->invoice->verified_by = Auth::id();

        $this->investment->save();
        $this->investment->invoice->save();

        //flashes a notification to the investor
        $this->investment->user->notify(new ContractSigning($this->investment->user_id));


        return redirect()->route('admin.verification-center');
    }

    public function render()
    {
        return view('livewire.app.admin.payment-detail');
    }
}
