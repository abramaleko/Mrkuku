<?php

use App\Http\Controllers\Auth\GoogleSignInController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Livewire\App\Admin\Contacts;
use App\Http\Livewire\App\Admin\PaymentDetail;
use App\Http\Livewire\App\Admin\RolePermission;
use App\Http\Livewire\App\Admin\Roles;
use App\Http\Livewire\App\Admin\Permissions;
use App\Http\Livewire\App\Admin\SlipVerify;
use App\Http\Livewire\App\Admin\Subscriber;
use App\Http\Livewire\App\Admin\Support\Support;
use App\Http\Livewire\App\Admin\UserDetails;
use App\Http\Livewire\App\Admin\Users;
use App\Http\Livewire\App\Blog\Create;
use App\Http\Livewire\App\Blog\Dashboard;
use App\Http\Livewire\App\Investor\Investments;
use App\Http\Livewire\App\Investor\InvoiceDetails;
use App\Http\Livewire\App\Investor\ProjectCalculator;
use App\Http\Livewire\App\Investor\SignContract;
use App\Http\Livewire\App\Investor\SubmitSlips;
use App\Http\Livewire\App\Support\InvestorSupport;
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

//Google sign in routes

//redirect to the oauth provider
Route::get('/auth/redirect',[GoogleSignInController::class,'redirectUser'])->name('google-signIn');

//authorize user
Route::get('/auth/callback',[GoogleSignInController::class,'authorizeUser']);


Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::get('/investments', [HomeController::class, 'investments'])
    ->name('investments');

Route::get('/learn', [HomeController::class, 'learn'])
    ->name('learn');

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact');

 //live support route
 Route::get('/support',InvestorSupport::class)
  ->middleware('auth')
  ->name('investor.support');

Route::post('/contact', [HomeController::class, 'uploadContactMessage'])
    ->name('uploadContactMessage');

Route::post('/subscribe', [HomeController::class, 'saveSubscriber'])
    ->name('saveSubscriber');

//Investments packages links
Route::name('investments.')->group(function () {
    Route::get('/investments/gold', function () {
        return view('web.gold');
    })->name('gold');

    Route::get('/investments/diamond', function () {
        return view('web.diamond');
    })->name('diamond');


    Route::get('/investments/tanzanite', function () {
        return view('web.tanzanite');
    })->name('tanzanite');
});

Route::get('posts', [BlogController::class, 'allPosts'])
    ->name('blog.allPosts');
Route::get('post/{id}', [BlogController::class, 'viewPosts'])
        ->name('blog.viewPost');

 //submit comment route
 Route::post('comment',[BlogController::class,'commentPost'])
         ->middleware('auth')
         ->name('blog.commentPost');

//blog routes
Route::prefix('blog')->name('blog.')->group(function () {
    // Route::get('/posts',[BlogController::class,'allPosts'] )
    // ->name('allPosts');

    //dashboard posts
    Route::get('/dashboard', Dashboard::class)
        ->middleware('auth')
        ->name('dashboard');

    //create&save blog post
    Route::get('/create', Create::class)
        ->middleware('auth')
        ->name('create');
});

//investor route
Route::prefix('investor')->name('investor.')->middleware('auth')
->group(function(){

    Route::get('/investments',Investments::class)->name('myInvestments');

    Route::get('/calculator',ProjectCalculator::class)->name('calculator');

    Route::get('invoice/{id}',InvoiceDetails::class)->name('invoice-details');

    Route::get('invoice/verify/{investment}',[InvoiceController::class,'showSubmitPage'])->name('invoice-submit-paymentslips');

    Route::post('invoice/verify/{investment}',[InvoiceController::class,'submitSlips'])->name('invoice-upload-paymentslips');

    Route::get('/invoice/pdf/{investment}/{download?}',[InvoiceController::class,'printInvoice'])->name('print-invoice');

    Route::get('/investment/contract/{contract}',SignContract::class)->name('sign-contract');
});

//admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/roles', Roles::class)
        ->middleware('auth')
        ->name('roles');

    Route::get('/permissions', Permissions::class)
        ->middleware('auth')
        ->name('permissions');

    Route::get('/role/{id}/permission', RolePermission::class)
        ->middleware('auth')
        ->name('role.permission');

    Route::get('/contacts', Contacts::class)
        ->middleware('auth')
        ->name('contacts');

        Route::get('/support', Support::class)
        ->middleware('auth')
        ->name('support');

    Route::get('/users', Users::class)
        ->middleware('auth')
        ->name('users');

    Route::get('/user/details/{id}', UserDetails::class)
        ->middleware('auth')
        ->name('user.details');

    Route::get('/subscribers', Subscriber::class)
        ->middleware('auth')
        ->name('subscribers');

        Route::get('/verification_center', SlipVerify::class)
        ->middleware('auth')
        ->name('verification-center');

        Route::get('/verify/investment/{investment}', PaymentDetail::class)
        ->middleware('auth')
        ->name('payment-detail');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//ckfinder routes
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    // ->middleware('auth')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    // ->middleware('auth')
    ->name('ckfinder_browser');

