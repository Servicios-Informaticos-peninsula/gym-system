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
Route::get('/acceso/usuarios', function () {
    return view('auth.login');
});

Auth::routes(['register' => true, 'login' => true, 'password/confirm' => false, 'password/reset' => false]);
require __DIR__ . '/ajax/rutas.php';
/*
 * Home Routes
 */
Route::get('perfil/actualizar', ['as' => 'perfil.edit', 'uses' => 'UserController@edit_user']);
Route::patch('perfil/actualizar', ['as' => 'perfil.update', 'uses' => 'UserController@update_user']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/punto/venta', [App\Http\Controllers\HomeController::class, 'index'])->name('sales.point');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    });

    Route::controller('ProviderController')
        ->prefix('proveedores/')
        ->group(function () {
            Route::get('lista', 'index')->name('provider.index');
            Route::post('registro', 'store')->name('provider.store');
            Route::put('modificar/{id}', 'update')->name('provider.update');
            Route::delete('eliminar/{id}', 'destroy')->name('provider.destroy');
        });

    Route::controller('UserController')
        ->prefix('clientes/')
        ->group(function () {
            Route::get('lista', 'index')->name('user.index');
            Route::post('registro', 'store')->name('user.store');
            Route::put('modificar/{id}', 'update')->name('user.update');
            Route::delete('eliminar/{id}', 'destroy')->name('user.destroy');
        });

    Route::controller('RecordController')
        ->prefix('expediente/')
        ->group(function () {
            Route::get('lista', 'index')->name('record.index');
            Route::get('crear', 'create')->name('record.create');
            Route::post('registro', 'store')->name('record.store');
            Route::get('vista/modificar/{id}', 'edit')->name('record.edit');
            Route::put('modificar/{id}', 'update')->name('record.update');
            Route::delete('eliminar/{id}', 'destroy')->name('record.destroy');
        });
    /**Rutas AJAX */

    Route::resource('Membership-type', MembershipTypeController::class);
    Route::resource('Membership', MembershipController::class);

    Route::resource('products', ProductController::class);

    Route::resource('product-units', ProductUnitController::class);
    Route::resource('product-categories', ProductCategoryController::class);

    Route::get('inventory/updateStatus/{id}', 'InventoryController@updateStatus')->name('inventory.status');
    Route::resource('inventory', InventoryController::class);

    Route::resource('workers', WorkersController::class);
});
