<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;

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
    return view('home');
});

// Route::get('/history', function () {
//     $orders=Order::All();
//     return view('history', compact('orders'));
// });

// Route::get('/product', function () {
//     return view('layouts.product');
// });
// Route::get('/order', function () {
//     return view('layouts.order');
// });

// Route::get('/coba', function () {
//     return view('product_index');
// });
Route::resource('product', ProductController::class);

Route::resource('order', OrderController::class);

Route::get('history','OrderController@history');



// use App\Http\Controllers\TestController;
// Route::get('test',[TestController::class, 'test']);
