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
            $table->dateTime('date_interview')->nullable();
            //Enfermedades cronicas//
            $table->string('hipertension')->nullable();
            $table->string('asma')->nullable();
            $table->string('epilepsia')->nullable();
            $table->string('ciatica')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('lumbagia')->nullable();
            $table->string('arritmia')->nullable();
            /**Enfermedades Mentales */
            $table->string('ansiedad')->nullable();
            $table->string('depresion')->nullable();
            $table->string('depre_postparto')->nullable();
            $table->string('estres_cronico')->nullable();
            $table->string('estres_postraumatico')->nullable();
            /**ETS */
            $table->string('papiloma_humano')->nullable();
            $table->string('herpes')->nullable();
            $table->string('sifilis')->nullable();
            $table->string('gonorrea')->nullable();
            $table->string('sida')->nullable();
            $table->string('clamidia')->nullable();
            /**Condiciones Fisicas */
            $table->string('desmayos')->nullable();
            $table->string('mareos')->nullable();
            $table->string('perdida_conocimiento')->nullable();
            $table->string('hospitalizacion')->nullable();
            /**Hospitalizaciones */
            $table->string('causa')->nullable();
            $table->date('fecha_hospitalizacion')->nullable();
            /**cirugias */
            $table->string('cesarea')->nullable();
            $table->string('abortos')->nullable();
            $table->string('apendice')->nullable();
            $table->string('vesicula')->nullable();
            $table->string('otro')->nullable();
            $table->date('fecha_cirugia')->nullable();
            $table->string('causa_cirugia')->nullable();
            $table->string('especifique_text')->nullable();
            /**Sintomas adicionales */
            $table->string('alergias')->nullable();
            $table->string('cefaleas')->nullable();
            $table->string('vision_borrosa')->nullable();
            $table->string('cancer')->nullable();
            $table->string('ausencia_organos')->nullable();
            $table->string('embarazos')->nullable();
            $table->string('aborto')->nullable();
            $table->string('metodo_anticonceptivo')->nullable();
            $table->string('craneocefalico')->nullable();
            $table->string('cervicales')->nullable();
            $table->string('alergias_text')->nullable();
            /**Medicamentos */
            $table->string('medicamentos')->nullable();
            $table->string('numero_control')->nullable();
            /**foraneas */

            $table->foreignId('users_id')->constrained();
            $table->foreignId('exercises_id')->nullable()->constrained();//

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
