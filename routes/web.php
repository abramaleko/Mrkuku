<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\App\Admin\Contacts;
use App\Http\Livewire\App\Admin\RolePermission;
use App\Http\Livewire\App\Admin\Roles;
use App\Http\Livewire\App\Admin\Permissions;
use App\Http\Livewire\App\Admin\Subscriber;
use App\Http\Livewire\App\Admin\UserDetails;
use App\Http\Livewire\App\Admin\Users;
use App\Http\Livewire\App\Blog\Create;
use App\Http\Livewire\App\Blog\Dashboard;
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



Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::get('/investments', [HomeController::class, 'investments'])
    ->name('investments');

Route::get('/learn', [HomeController::class, 'learn'])
    ->name('learn');

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact');

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

    Route::get('/users', Users::class)
        ->middleware('auth')
        ->name('users');

    Route::get('/user/details/{id}', UserDetails::class)
        ->middleware('auth')
        ->name('user.details');

    Route::get('/subscribers', Subscriber::class)
        ->middleware('auth')
        ->name('subscribers');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//ckfinder routes
// Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
//     // ->middleware('auth')
//     ->name('ckfinder_connector');

// Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
//     // ->middleware('auth')
//     ->name('ckfinder_browser');

