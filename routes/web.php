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
    /**Rutas del home */
    Route::controller('HomeController')->group(function () {
        Route::get('/punto/venta', 'index')->name('sales.point');
        Route::get('/home', 'home')->name('home');
    });

    Route::controller('ProviderController')->prefix('proveedores/')->group(function () {
        Route::get('lista', 'index')->name('provider.index');
        Route::get('crear', 'create')->name('provider.create');
        Route::post('registro', 'store')->name('provider.store');
        Route::get('actualizar','edit')->name('provider.edit');
        Route::put('modificar','update')->name('provider.update');
        Route::delete('eliminar','destroy')->name('provider.destroy');
    });
});
