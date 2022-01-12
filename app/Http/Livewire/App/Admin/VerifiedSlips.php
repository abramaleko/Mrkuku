<?php

namespace App\Http\Livewire\App\Admin;

use Illuminate\Support\Facades\DB;


use Livewire\Component;

class VerifiedSlips extends Component
{
    public $searchVerified;

    public function render()
    {
        //searchs only when the string has 3 characters and above
        if ($this->searchVerified && strlen($this->searchVerified) > 3) {
            $verifiedSlips = DB::table('investments')
                ->where('investments.verified', '=', true)
                //search query
                ->join('users', function ($join) {
                    $join->on('users.id', '=', 'investments.user_id')
                        ->where('users.name', 'like', '%' . $this->searchVerified . '%');
                })
                //joins the invoice table
                ->join('invoices', function ($join) {
                    $join->on('investments.invoice_id', '=', 'invoices.id')
                        ->where('invoices.verified', '=', true);
                })
                ->select('investments.*', 'invoices.invoice_number', 'users.name as investor_name')
                ->get();

        } else {
            $verifiedSlips = DB::table('investments')
                ->where('investments.verified', '=', true)
                ->join('invoices', function ($join) {
                    $join->on('investments.invoice_id', '=', 'invoices.id')
                        ->where('invoices.verified', '=', true);
                })
                ->join('users', 'investments.user_id', '=', 'users.id')
                ->select('investments.*', 'invoices.invoice_number', 'users.name as investor_name')
                ->get();

        }


        return view('livewire.app.admin.verified-slips', [
            'verifiedSlips' => $verifiedSlips,
        ]);
    }
}
