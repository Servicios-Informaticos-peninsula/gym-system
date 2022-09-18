<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_interview');
            //Enfermedades cronicas//
            $table->string('hipertension');
            $table->string('asma');
            $table->string('epilepsia');
            $table->string('ciatica');
            $table->string('diabetes');
            $table->string('lumbagia');
            $table->string('arritmia');
            /**Enfermedades Mentales */
            $table->string('ansiedad');
            $table->string('depresion');
            $table->string('depre_postparto');
            $table->string('estres_cronico');
            $table->string('estres_postraumatico');
            /**ETS */
            $table->string('papiloma_humano');
            $table->string('herpes');
            $table->string('sifilis');
            $table->string('gonorrea');
            $table->string('sida');
            $table->string('clamidia');
            /**Condiciones Fisicas */
            $table->string('desmayos');
            $table->string('mareos');
            $table->string('perdida_conocimiento');
            $table->string('hospitalizacion');
            /**Hospitalizaciones */
            $table->string('causa');
            $table->date('fecha_hospitalizacion');
            /**cirugias */
            $table->string('cesarea');
            $table->string('abortos');
            $table->string('apendice');
            $table->string('vesicula');
            $table->string('otro');
            $table->date('fecha_cirugia');
            $table->string('causa_cirugia');
            /**Sintomas adicionales */
            $table->string('alergias');
            $table->string('cefaleas');
            $table->string('vision_borrosa');
            $table->string('cancer');
            $table->string('ausencia_organos');
            $table->string('embarazos');
            $table->string('aborto');
            $table->string('metodo_anticonceptivo');
            $table->string('craneocefalico');
            $table->string('cervicales');

            /**Medicamentos */
            $table->string('medicamentos');
            /**foraneas */
            $table->foreignId('record_photos_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->foreignId('exercises_id')->constrained();

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
        Schema::dropIfExists('records');
    }
}
