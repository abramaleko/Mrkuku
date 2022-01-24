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
    }

    public function render()
    {
        return view('livewire.app.investor.invoice-details');
    }
}
