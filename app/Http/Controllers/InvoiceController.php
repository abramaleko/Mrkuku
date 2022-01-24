<?php

namespace App\Http\Controllers;

use App\Models\Investments;
use Illuminate\Support\Facades\Storage;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Clegginabox\PDFMerger\PDFMerger as PDFMerger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InvoiceController extends Controller
{


    public function printInvoice(Investments $investment, $download = false)
    {
        /*
        Create pdf's and save them temporarily in the public disk for merging

        Then merge the two invoices

        Delete the temporariry pdf's

        */

       /*check investment belongs to which project
        1=chicken rearing project
        2= corn farming project

       */
       if ($investment->project_id === 1) {
        $invoice1 = $this->printRearingInvoice1($investment);
        $invoice2 = $this->printRearingInvoice2($investment);
       }
       elseif ($investment->project_id === 2) {
        $invoice1 = $this->printCornInvoice1($investment);
        $invoice2 = $this->printCornInvoice2($investment);
       }
        $invoice1->filename = 'invoice1' . rand(100, 1000) . '.pdf';
        $invoice1->save('public');


        $invoice2->filename = 'invoice2' . rand(100, 1000) . '.pdf';
        $invoice2->save('public');

        $merge = new PDFMerger;
        $merge->addPDF(storage_path('app/public/' . $invoice1->filename), 'all');
        $merge->addPDF(storage_path('app/public/' . $invoice2->filename), 'all');
        $merge->merge();

        Storage::disk('public')->delete([$invoice1->filename, $invoice2->filename]);


        if ($download)
            return $merge->merge('download', 'invoices.pdf', 'P');
        else
            return $merge->merge('download', 'invoices.pdf', 'P');
    }

    //invoice 2 for chicken rearing project
    protected function printRearingInvoice2($investment)
    {
        $client = new Party([
            'name'          => 'Bravo Feeds Mill Limited',
            'phone'         => '0659-071309',
            'custom_fields' => [
                'TIN #'        => '141-790-919',
            ],
        ]);

        $customer = new Party([
            'name'          => $investment->user->name,
            'phone'       => $investment->user->phone_no,
            'custom_fields' => [
                'email'          =>  $investment->user->email,
            ],
        ]);

        $item = [
            (new InvoiceItem())
                ->title('Broiler Chicks')
                ->pricePerUnit(1500)
                ->quantity($investment->units),

            (new InvoiceItem())
                ->title('Foods & Medicine')
                ->pricePerUnit(2700)
                ->quantity($investment->units),


        ];

        $notes = [
            '',
            'BANK DETAILS',
            'NBC BANK: 011103039855',
            'AMANA BANK: 003111162140003',
            'BRAVO FEEDS MILLS LTD',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('Profoma Invoice')
            ->seller($client)
            ->buyer($customer)
            ->date($investment->invoice->created_at)
            ->dateFormat('m/d/Y')
            ->payUntilDays(30)
            ->currencyCode('Tshs')
            ->currencyFraction('Cents')
            ->currencyFormat('{VALUE} Tshs ')
            ->currencyThousandsSeparator(',')
            ->currencyDecimalPoint('.')
            ->addItems($item)
            ->notes($notes)
            ->setCustomData(
                $investment->invoice->invoice_number
            );
        // And return invoice itself to browser or have a different view
        return $invoice;
    }

    //invoice 1 for chicken rearing project
    protected function printRearingInvoice1($investment)
    {
        $client = new Party([
            'name'          => 'Mr Kuku Farmers Limited',
            'phone'         => '0659-071309',
            'custom_fields' => [
                'TIN #'        => '141-097-253',
            ],
        ]);

        $customer = new Party([
            'name'          => $investment->user->name,
            'phone'       => $investment->user->phone_no,
            'custom_fields' => [
                'email'          =>  $investment->user->email,
            ],
        ]);

        $item = [
            (new InvoiceItem())
                ->title('Chicken Rearing Management Fees')
                ->pricePerUnit(800)
                ->quantity($investment->units)
        ];

        $notes = [
            '',
            'BANK DETAILS',
            'NBC BANK: 011103039843',
            'AMANA BANK: 003120959810001',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('Profoma Invoice')
            ->seller($client)
            ->buyer($customer)
            ->date($investment->invoice->created_at)
            ->dateFormat('m/d/Y')
            ->payUntilDays(30)
            ->currencyCode('Tshs')
            ->currencyFraction('Cents')
            ->currencyFormat('{VALUE} Tshs ')
            ->currencyThousandsSeparator(',')
            ->currencyDecimalPoint('.')
            ->addItems($item)
            ->notes($notes)
            ->setCustomData(
                $investment->invoice->invoice_number
            )
            ->logo(public_path('images/logo.jpeg'));

        // And return invoice itself to browser or have a different view
        return $invoice;
    }


//invoice 1 for corn farming project
protected function printCornInvoice1($investment)
{
    $client = new Party([
        'name'          => 'Bravo Feeds Mill Limited',
        'phone'         => '0659-071309',
        'custom_fields' => [
            'TIN #'        => '141-790-919',
        ],
    ]);

    $customer = new Party([
        'name'          => $investment->user->name,
        'phone'       => $investment->user->phone_no,
        'custom_fields' => [
            'email'          =>  $investment->user->email,
        ],
    ]);

    $item = [
        (new InvoiceItem())
            ->title('Land Rent')
            ->pricePerUnit(1020000)
            ->quantity($investment->units),

    ];

    $notes = [
        '',
        'BANK DETAILS',
        'NBC BANK: 011103039855',
        'EQUITY BANK: 3003211761898',
    ];
    $notes = implode("<br>", $notes);

    $invoice = Invoice::make('Profoma Invoice')
        ->seller($client)
        ->buyer($customer)
        ->date($investment->invoice->created_at)
        ->dateFormat('m/d/Y')
        ->payUntilDays(30)
        ->currencyCode('Tshs')
        ->currencyFraction('Cents')
        ->currencyFormat('{VALUE} Tshs ')
        ->currencyThousandsSeparator(',')
        ->currencyDecimalPoint('.')
        ->addItems($item)
        ->notes($notes)
        ->setCustomData(
            $investment->invoice->invoice_number
        );


    // And return invoice itself to browser or have a different view
    return $invoice;
}



    //invoice 2 for corn farming project
    protected function printCornInvoice2($investment)
    {
        $client = new Party([
            'name'          => 'Mr Kuku Farmers Limited',
            'phone'         => '0659-071309',
            'custom_fields' => [
                'TIN #'        => '141-097-253',
            ],
        ]);

        $customer = new Party([
            'name'          => $investment->user->name,
            'phone'       => $investment->user->phone_no,
            'custom_fields' => [
                'email'          =>  $investment->user->email,
            ],
        ]);

        $item = [
            (new InvoiceItem())
                ->title('Inputs')
                ->pricePerUnit(189000)
                ->quantity($investment->units),

                (new InvoiceItem())
                ->title('Management Fee')
                ->pricePerUnit(66000)
                ->quantity($investment->units),
        ];

        $notes = [
            '',
            'BANK DETAILS',
            'NBC BANK: 011103039843',
            'EQUITY BANK: 3003211761800',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('Profoma Invoice')
            ->seller($client)
            ->buyer($customer)
            ->date($investment->invoice->created_at)
            ->dateFormat('m/d/Y')
            ->payUntilDays(30)
            ->currencyCode('Tshs')
            ->currencyFraction('Cents')
            ->currencyFormat('{VALUE} Tshs ')
            ->currencyThousandsSeparator(',')
            ->currencyDecimalPoint('.')
            ->addItems($item)
            ->notes($notes)
            ->setCustomData(
                $investment->invoice->invoice_number
            )
            ->logo(public_path('images/logo.jpeg'));

        // And return invoice itself to browser or have a different view
        return $invoice;
    }


    public function showSubmitPage(Investments $investment)
    {
        //check user is owner of the invoice
        if (! (Auth::id()== $investment->user_id)) {
            abort(403, 'Unauthorized.');
        }

        //checks for the previously submmitted slips and if they were verified if already
        //verified decline the request
        if (! $investment->verified )
        {
            return view(
            'livewire.app.investor.submit-slips',
            ['investment' => $investment]
        );
       }
        else
        abort(403, 'Unauthorized.');

    }

    public function submitSlips(Investments $investment, Request $request)
    {
        $paths = [];

        //validate the request
        $messages = [
            "slips.max" => "Files uploaded can not be more than 5.",
            "slips.mimes" => "The payment slips are of unsupported type, supported types are images and pdf's",
        ];

        $this->validate($request, [
            'slips' => 'required|max:5',
            'slips.*' => 'file|mimes:pdf,jpg,jpeg,png,webp|max:5000'
        ], $messages);

        //save the payment slips in the payment-slips directory
        foreach ($request->file('slips') as $slip) {
            $path = Storage::putFile('public/payment-slips', $slip);
            array_push($paths, $path);
        }
        //serialize paths and store them to database
        $investment->invoice->verification_attachments = serialize($paths);
        $investment->invoice->verification_error='';
        $investment->invoice->save();

        $request->session()->flash('success', 'Congratulations on submitting your payment slips, we will soon notify you once we have approved these slips');

        return back();
    }
}
