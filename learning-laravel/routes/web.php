<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ProductController;

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
// Router::get('product',
// ProductController::class,
// 'index');
// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/foods', function () {
//     return ['sushi', 'sasimi'];
// });
// Route::get('/aboutme', function () {
//     redirec('/');
// });
Route::get('/unicode', function () {
    return view("form");
    
});
Route::post('/unicode', function () {
    return 'Phuong thuc post';
});
Route::put('/unicode', function () {
    return 'Phuong thuc put';
});
