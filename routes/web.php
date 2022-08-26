<?php

use App\Http\Controllers\ProviderController;
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
Auth::routes(['register' => true,
    'login' => true,
    'password/confirm' => false,
    'password/reset' => false,
]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    /**Rutas del home */

    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/punto/venta', [App\Http\Controllers\HomeController::class, 'index'])->name('sales.point');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    });


    Route::controller('ProviderController')->prefix('proveedores/')->group(function () {
        Route::get('lista',  'index')->name('provider.index');
        Route::post('registro',  'store')->name('provider.store');
        Route::put('modificar/{id}', 'update')->name('provider.update');
        Route::delete('eliminar/{id}', 'destroy')->name('provider.destroy');
    });
});
