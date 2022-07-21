<?php

use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class , 'index']);
Route::get('/checkout', [PageController::class, 'getCheckout'])->name('banhang.checkout');
Route::get('/type/{id}', [PageController::class , 'getLoaiSp']);
Route::get('/add-to-cart/{id}', [PageController::class , 'addToCart'])->name('banhang.addtocart');
Route::get('/type/{id}', [PageController::class , 'getLoaiSp']);
Route::post('checkout', [PageController::class , 'postCheckout']);
Route::get('del-cart/{id}', [PageController::class , 'delItemCart'])->name('banhang.delete');