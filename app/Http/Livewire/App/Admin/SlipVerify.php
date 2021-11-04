<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Investments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class SlipVerify extends Component
{
    public $pendingSlips;
    public $verifiedSlips;
    public $showPending=true;

    public function mount()
    {
      $this->getPendingSlips();

      $this->verifiedSlips();
    }

    protected function getPendingSlips()
    {
        $this->pendingSlips=DB::table('investments')
                            ->join('invoices',function($join){
                                $join->on('investments.invoice_id', '=', 'invoices.id')
                                ->where('invoices.verified','=',false)
                                ->where('invoices.verification_attachments','!=','')
                                ->where('invoices.verification_error','=','');
                            })
                            ->join('users','investments.user_id','=','users.id')
                            ->select('investments.*','invoices.invoice_number','users.name as investor_name')
                            ->get();


    }


    protected function verifiedSlips()
    {
       $this->verifiedSlips=DB::table('investments')
                          ->where('investments.verified','=',true)
                                ->join('invoices', function ($join) {
                                    $join->on('investments.invoice_id', '=', 'invoices.id')
                                    ->where('invoices.verified','=',true);
                                })
                                ->join('users','investments.user_id','=','users.id')
                                ->select('investments.*','invoices.invoice_number','users.name as investor_name')
                                ->get();


    }

    public function getShowPending()
    {
        $this->showPending=true;
    }

    public function getShowVerified()
    {
        $this->showPending=false;
    }

    public function render()
    {
         //if user does not have the permissions
         if (! auth()->user()->can('verify slips')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.slip-verify');
    }
}
