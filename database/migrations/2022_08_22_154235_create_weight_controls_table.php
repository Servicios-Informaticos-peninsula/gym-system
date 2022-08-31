<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_controls', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_visita');
            $table->float('peso');
            $table->float('IMC');
            $table->float('grasa');
            $table->float('musculo');
            $table->float('KCAL');
            $table->float('edad');
            $table->float('visceral');
            $table->float('busto');
            $table->float('cintura');
            $table->float('cadera');
            $table->float('brazo_der');
            $table->float('brazo_izq');
            $table->float('pierna_der');
            $table->float('pierna_izq');
            $table->foreignId('records_id')->constrained();
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
        Schema::dropIfExists('weight_controls');
    }
}
