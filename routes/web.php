<?php

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



Route::get('/', function () {
    return view('web.index');
})->name('home');

Route::get('/investments', function () {
    return view('web.investments');
})->name('investments');

Route::get('/learn', function () {
    return view('web.learn');
})->name('learn');

Route::get('/company', function () {
    return view('web.company');
})->name('company');

Route::get('/contact', function () {
    return view('web.contact');
})->name('contact');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
