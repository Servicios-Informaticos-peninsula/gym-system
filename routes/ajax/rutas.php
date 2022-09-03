<?php
use Illuminate\Support\Facades\Route;
Route::controller('RecordController')->prefix('usuarios/')->group(function () {

        Route::post('datos', 'getuser')->name('record.getuser');
        Route::post('/expediente/getexpediente', 'getList')->name('expediente.get');
        Route::post('/datos/list', 'getData')->name('data.get');

    });
    Route::get('pdf/expediente/{id}','RecordController@show')->name('expediente.pdf');
