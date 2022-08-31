<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychobiologicalHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychobiological_habits', function (Blueprint $table) {
            $table->id();
            $table->string('numero_comidas');
            $table->string('horas_descanso');
            $table->string('micciones_dia');
            $table->string('micciones_noche');
            $table->string('evacuaciones');
            $table->string('tabaco');
            $table->string('alcohol');
            $table->string('marihuana');
            $table->string('opiaceos');
            $table->string('cocaina');
            $table->string('heroina');
            $table->string('pastillas');
            $table->string('crack');
            $table->string('resistol');
            $table->string('gasolina');
            $table->string('thiner');
            $table->string('cristal');
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
        Schema::dropIfExists('psychobiological_habits');
    }
}
