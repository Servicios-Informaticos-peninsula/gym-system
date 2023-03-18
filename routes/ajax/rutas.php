<?php
use Illuminate\Support\Facades\Route;
Route::controller('RecordController')
    ->prefix('usuarios/')
    ->group(function () {
        Route::post('datos', 'getuser')->name('record.getuser');
        Route::post('/expediente/getexpediente', 'getList')->name('expediente.get');
        Route::post('/datos/list', 'getData')->name('data.get');
        Route::post('/expediente/list', 'getRecord')->name('record.get');
    });
    Route::get('pdf/expediente/{id}','RecordController@show')->name('expediente.pdf');
    Route::get('fotos/pdf/expediente/{id}','RecordController@showImg')->name('expediente.fotos');
    Route::post('products/sale', 'SalesController@search')->name('search.products');
    Route::post('products/cashPayment', 'SalesController@cashPayment')->name('cash.payment');
   Route::get('sales/tickets/{id}', 'SalesController@show');

//Statistics
Route::post('statistics/chart', 'EstadisticasController@masVendidoChart')->name('masVendido.charts');

Route::post('cancelacion/index', 'BitacoraCancelacionController@getCancelacion')->name('cancelacion.index');
Route::post('ventas/index', 'BitacoraCancelacionController@getVentas')->name('ventas.index');
Route::post('corte/datos', 'CorteCajaController@getData')->name('corte.data');
Route::post('cerrar/caja', 'CorteCajaController@update')->name('cerrar.caja');
Route::post('bitacora/acceso', 'BitacoraAccesoController@getAcceso')->name('bitacora.acceso');
Route::post('enviar/ticket', 'SalesController@enviarTicket')->name('enviar.ticket');
Route::post('validar/membresia', 'MembershipController@validacionMembresia')->name('validacion.memnbresia');
Route::get('ver/tickets/{id}', 'SalesController@verTicket');
