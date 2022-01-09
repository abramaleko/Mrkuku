<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\DB;


class InvestmentConversations extends Conversation
{

    protected $full_name, $phone_no, $amount,$acres;

    public function run()
    {
        $question = Question::create('How can I help you ?')
            ->addButtons([
                Button::create('I want to invest in Mr.Kuku projects')->value('1'),
                Button::create('No, I would like to know more about Mr.Kuku projects')->value('2'),
            ]);

        $this->ask($question, function ($answer) {


            if ($answer->getValue() == '1') {
                $this->say('You choose: To invest in Mr Kuku Projects');
                $this->askProject();
            } elseif ($answer->getValue() == 2) {
                $this->say('You choose: To know more about about our projects');
                $this->say('To know more about our projects you can visit the investment page or read from out blog posts ');
            } else {
                return $this->repeat('Please choose the correct option from the above buttons');
            }
        });
    }

    function askProject()
    {
        $question = Question::create('Which project ?')
            ->addButtons([
                Button::create('Mr.Kuku Chicken Rearing Project')->value('1'),
                Button::create('Bravo Corn Farming Project')->value('2'),
            ]);

        $this->ask($question, function ($answer) {
            if ($answer->getValue() == '1') {
                $this->say('You choose: Invest in Mr.Kuku Chicken Rearing Project');
                $this->chickenProject();
            } elseif ($answer->getValue() == 2) {
                $this->say('You choose: Bravo Corn Farming Project');
                 $this->farmProject();
            } else {
               $this->say('You choose: Bravo Corn Farming Project');
                return $this->repeat('Please choose the correct option from the above buttons');
            }
        });
    }

    function chickenProject()
    {
        $this->ask('How much do you want invest in this project (Tshs) ?', function ($answer) {
            $amount = intval($answer->getText());

            if ($amount >= 500000) {
                $this->confirmChickenAmount($amount);
            } else {
                $this->say('Please enter the correct amount');
                return $this->repeat('The minimal amount is 500,000 Tshs for this project');
            }
        });
    }

    function farmProject()
    {
        $this->say('To invest in this project, the minimum acres you can get is 1 acre which equals to 1,275,000 Tshs');
        $this->ask('How many acres do you want to invest in this project ?', function ($answer) {
            $acres = intval($answer->getText());

            if ($acres >= 1 && $acres <= 1200) {
                $this->confirmFarmAmount($acres);
            } else {
                $this->say('Please enter the correct number of acres');
                return $this->repeat('The minimum acres you can get is 1 acre and maximum is 1200 acres');
            }
        });
    }

    function confirmFarmAmount($acres)
    {
        $this->acres = $acres;

        $question = Question::create('Confirm you want to invest ' . number_format($acres) . ' acres to Bravo Corn Farming Project')
            ->addButtons([
                Button::create('Yes, I do confirm')->value('yes'),
                Button::create('No, I want to re-enter the acres again')->value('no'),
            ]);

        $this->ask($question, function ($answer) {
            if ($answer->getText() == 'yes') {
                $this->say('You have confirmed to invest ' . number_format($this->acres) . ' acres to Bravo Corn Farming Project');
                $this->say('Please provide us with the following details so we can prepare an invoice for you');
                $this->collectName();
            } elseif ($answer->getText() == 'no') {
                $this->say('You choose: Re-enter the acres to invest');
                $this->farmProject();
            } else {
                return $this->repeat('Please choose the correct option from the above buttons');
            }
        });
    }

    function confirmChickenAmount($amount)
    {
        $this->amount = $amount;

        $question = Question::create('Confirm you want to invest ' . number_format($amount) . ' Tshs to Mr.Kuku Chicken Rearing Project')
            ->addButtons([
                Button::create('Yes, I do confirm')->value('yes'),
                Button::create('No, I want to re-enter the amount again')->value('no'),
            ]);

        $this->ask($question, function ($answer) {
            if ($answer->getText() == 'yes') {
                $this->say('You have confirmed to invest ' . number_format($this->amount) . ' Tshs to Mr.Kuku Chicken Rearing Project');
                $this->say('Please provide us with the following details so we can prepare an invoice for you');
                $this->collectName();
            } elseif ($answer->getText() == 'no') {
                $this->say('You choose: Re-enter the amount to invest');
                $this->chickenProject();
            } else {
                return $this->repeat('Please choose the correct option from the above buttons');
            }
        });
    }

    function collectName()
    {
        $this->ask('Please enter your full name', function ($answer) {
            if ($answer == '') {
                return $this->repeat('This does not appear to be a name, please re-enter your name');
            }
            else{
                $this->full_name = $answer->getText();
                $this->collectPhoneNo();
            }
        });
    }

    function collectPhoneNo()
    {
        $this->ask('Please enter your phone number (WhatsApp number is preferable)', function ($answer) {
            if ($answer == '') {
                return $this->repeat('This does not appear to be a name, please re-enter your name');
            }
            else {
                $this->phone_no = $answer->getText();
                $this->confirmDetails();
            }
        });


    }

    function confirmDetails()
    {
        $this->say('Please confirm these details if they are correct');

        $this->say('Full name: ' . $this->full_name);

        $this->say('Phone number: ' . $this->phone_no);

        $question = Question::create('Do you confirm this details are correct ?')
            ->addButtons([
                Button::create('Yes, I do confirm')->value('yes'),
                Button::create('No, I want to re-enter the details again')->value('no'),
            ]);

        $this->ask($question, function ($answer) {
            if ($answer->getText() == 'yes') {
                $this->saveDetails();
                $this->say('Congratulations ' . $this->full_name . ', you will soon be contacted by our team and provided the invoice for payment');
            } elseif ($answer->getText() == 'no') {
                $this->say('You choose: Re-enter the details again');
                $this->collectName();
            } else {
                return $this->repeat('Please choose the correct option from the above buttons');
            }
        });
    }

   private function saveDetails(){
      DB::connection('mysql2')
          ->insert('insert into invoices (name,phone_no,amount,acres,created_at,updated_at) values (?,?,?,?,?,?)',[
        $this->full_name,
        $this->phone_no,
        $this->amount ?? null,
        $this->acres ?? null,
        now(),now()
      ]);

      return true;

    }
}
