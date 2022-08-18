<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalitationDialiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalitation_dialies', function (Blueprint $table) {
            $table->id();
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->boolean('repeat')->default(true);
            $table->foreignId('repeat_catalogs_id')->constrained();
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
        Schema::dropIfExists('personalitation_dialies');
    }
}
