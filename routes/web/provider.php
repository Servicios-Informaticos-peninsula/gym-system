<?php
use Illuminate\Support\Facades\Route;
Route::controller('ProviderController')->prefix('proveedores/')->group(function () {
        Route::get('lista', 'index')->name('provider.index');
        Route::get('crear', 'create')->name('provider.create');
        Route::post('registro', 'store')->name('provider.store');
        Route::get('actualizar','edit')->name('provider.edit');
        Route::put('modificar','update')->name('provider.update');
        Route::delete('eliminar','destroy')->name('provider.destroy');
    });
