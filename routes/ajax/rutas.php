<?php
use Illuminate\Support\Facades\Route;
Route::controller('RecordController')->prefix('usuarios/')->group(function () {

        Route::post('datos', 'getuser')->name('record.getuser');
        Route::post('/expediente/getexpediente', 'getList')->name('expediente.get');
        Route::post('/datos/list', 'getData')->name('data.get');
        Route::post('/expediente/list', 'getRecord')->name('record.get');

    });
    Route::get('pdf/expediente/{id}','RecordController@show')->name('expediente.pdf');
    Route::get('fotos/pdf/expediente/{id}','RecordController@showImg')->name('expediente.fotos');