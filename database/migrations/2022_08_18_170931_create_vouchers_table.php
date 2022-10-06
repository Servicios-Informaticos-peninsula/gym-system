<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('carts_id')->constrained();
            $table->integer('quantity');
            $table->double('price_total');
            $table->string("vendendor");
            $table->string('tipo_pago');
            $table->double('cantidad_pagada')->nullable();
            $table->string('folio_transferencia')->nullable();
            $table->string('claveo_rastreo')->nullable();
            $table->double('cambio')->nullable();
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
