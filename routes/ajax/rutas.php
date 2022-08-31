<?php
use Illuminate\Support\Facades\Route;
Route::controller('RecordController')->prefix('usuarios/')->group(function () {

        Route::post('datos', 'getuser')->name('record.getuser');

    });
