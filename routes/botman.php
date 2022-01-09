<?php

use App\Http\Conversations\InvestmentConversations;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
    // Your driver-specific configuration
    'web' => [
    	'matchingData' => [
            'driver' => 'web',
        ],
    ]
];


// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

// Create BotMan instance
$botman = app('botman');


//define all the bot commands
$botman->hears('My name is {name}',function(BotMan $bot,$name){
   $bot->reply('Nice to meet you, '.$name);
   $bot->startConversation(new InvestmentConversations());

});

$botman->hears('Hi',function(BotMan $bot){
    $bot->reply('Hello');
    $bot->startConversation(new InvestmentConversations());

 });

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand you 😔');
    $bot->reply('But I can help you 😊, if you start by typing Hi ');

    //create fallbacks for
});


