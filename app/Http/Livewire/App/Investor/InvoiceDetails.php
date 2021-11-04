<?php

namespace App\Http\Livewire\App\Investor;

use App\Models\Investments;
use Livewire\Component;


class InvoiceDetails extends Component
{
    public $investment;

    public $investmentDetails=[];

    public function mount($id)
    {
        $this->investment=Investments::find($id);

        $this->invoiveBreakdown();
    }

    protected function invoiveBreakdown()
    {
       $this->investment->rear_cost=$this->investment->units * 800 ;

       $this->investment->doc_quantity=( ($this->investment->units * 0.1) + $this->investment->units );

       $this->investment->doc_cost=$this->investment->doc_quantity* 1500 ;

       $this->investment->feed_cost=$this->investment->units* 2700 ;


    }

    public function render()
    {
        return view('livewire.app.investor.invoice-details');
    }
}
