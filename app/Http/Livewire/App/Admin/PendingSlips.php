<?php

namespace App\Http\Livewire\App\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PendingSlips extends Component
{
    public $searchPending;

    public function render()
    {
      //searchs only when the string has 3 characters and above
      if ($this->searchPending && strlen($this->searchPending) > 3) {
        $pendingSlips=DB::table('investments')
        ->join('invoices',function($join){
            $join->on('investments.invoice_id', '=', 'invoices.id')
            ->where('invoices.verified','=',false)
            ->where('invoices.verification_attachments','!=','')
            ->where('invoices.verification_error','=','');
        })
        //search query
        ->join('users', function ($join) {
            $join->on('users.id', '=', 'investments.user_id')
                ->where('users.name', 'like', '%' . $this->searchPending . '%');
        })
        ->select('investments.*','invoices.invoice_number','users.name as investor_name')
        ->get();
      }
      else {
        $pendingSlips=DB::table('investments')
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
        return view('livewire.app.admin.pending-slips',[
            'pendingSlips' => $pendingSlips,
        ]);
    }
}
