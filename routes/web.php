<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[HomeController::class,'home'])
->name('home');

Route::get('/investments',[HomeController::class,'investments'])
->name('investments');

Route::get('/learn',[HomeController::class,'learn'])
->name('learn');

Route::get('/contact',[HomeController::class,'contact'])
->name('contact');

//Investments packages links
Route::name('investments.')->group(function(){
    Route::get('/investments/gold',function(){
        return view ('web.gold');
    })->name('gold');

    Route::get('/investments/diamond',function(){
        return view ('web.diamond');
    })->name('diamond');


    Route::get('/investments/tanzanite',function(){
        return view ('web.tanzanite');
    })->name('tanzanite');
});

Route::resource('blog', BlogController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
