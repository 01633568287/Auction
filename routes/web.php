<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/input-product', function () {
    return view('product');
});


Route::group(['prefix'=>'admin'],function(){
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');

    Route::resources([
        'product'=>'ProductController',
    ]);
});

Route::get('n-n', function () {
    $users = App\Models\User::all();
    foreach($users as $user)
    {
        echo $user->name;
        echo '<br>';
        foreach($user->roles as $role)
        {
            echo $role->role;
        }
        echo '<hr>';
    }
});

Route::get('1-n', function () {
    $auctions = App\Models\Auction::all();
    foreach($auctions as $auction)
    {
        echo $auction->id;
        echo '<br>';
        foreach($auction->products as $prod)
        {
            echo $prod->product_name;
        }
        echo '<hr>';
    }
});

