<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorteCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte_cajas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->date('fecha_final')->nullable();
            $table->time('hora_final')->nullable();
            $table->float('cantidad_inicial');
            $table->float('cantidad_final')->nullable();
            $table->float('total_venta')->nullable();

          $table->float('diferencia')->nullable();
          $table->boolean('lActivo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corte_cajas');
    }
}
