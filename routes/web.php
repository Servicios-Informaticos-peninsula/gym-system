<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

//Auth::routes();
Auth::routes(['register' => false,
'login' => true,
    'password/confirm' => false,
    'password/reset' => false,
]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/punto/venta', [App\Http\Controllers\HomeController::class, 'index'])->name('sales.point');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
});

