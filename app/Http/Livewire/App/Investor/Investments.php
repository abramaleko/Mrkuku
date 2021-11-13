<?php

namespace App\Http\Livewire\App\Investor;

use App\Models\Investments as ModelsInvestments;
use App\Models\Invoices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Investments extends Component
{
   public $user_investments;


   public function mount()
   {
       $this->user_investments=ModelsInvestments::with('user')
       ->where('user_id',Auth::user()->id)
       ->orderBy('id','desc')
       ->get();
   }

   public function generateInvoice(ModelsInvestments $investment)
   {
       /*
       Invoices are generated from the followed range then shuffled and
       picked up randomly from the shuffles invoices
       */
    $invoices=range(100000,999000);
    shuffle($invoices);
    $invoice_number=array_rand($invoices);

   //inserts the invoice number in the invoice model
   $invoice=Invoices::create([
         'invoice_number' => $invoice_number,
         'expiry_date' => Carbon::now()->toDateTimeString()
    ]);

   //update the investment instance with invoice id
    $investment->invoice_id=$invoice->id;
    $investment->save();

    return redirect()->route('investor.myInvestments');

   }

   public function deleteInvoice( ModelsInvestments $investment)
   {
       //if the investment has an invoice record
     if ($investment->invoice_id) {
         $investment->invoice->delete();
     }

     $investment->delete();

     return redirect()->route('investor.myInvestments');

   }




    public function render()
    {
        return view('livewire.app.investor.investments');
    }
}
