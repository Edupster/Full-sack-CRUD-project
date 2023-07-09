<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class,'home'])->name('home');
Route::get('/createOrder', [HomeController::class,'createOrder'])->name('createOrder');
Route::get('/addBasket', [HomeController::class,'addBasket'])->name('addBasket');
Route::post('/addBasket', [HomeController::class,'addBasket'])->name('addBasket');
Route::delete('/CreateOrder{basket}/deleteItem', [HomeController::class,'deleteItem'])->name('deleteItem');
Route::get('/checkout', [HomeController::class,'checkout'])->name('checkout');
Route::get('/finishOrder', [HomeController::class,'finishOrder'])->name('finishOrder');
Route::get('/orders', [HomeController::class,'orders'])->name('orders');
Route::get('/cancelHome', [HomeController::class,'cancelHome'])->name('cancelHome');
Route::get('/order/{order}/edit', [HomeController::class,'editOrder'])->name('editOrder');
Route::post('/update{order}', [HomeController::class,'updateOrder'])->name('updateOrder');
Route::delete('/order/{order}/delete', [HomeController::class,'deleteOrder'])->name('deleteOrder');
Route::get('/basket', [HomeController::class,'basket'])->name('basket');
Route::get('/search', [HomeController::class,'search'])->name('search');


