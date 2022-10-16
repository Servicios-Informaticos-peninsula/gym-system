<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->date('init_date');
            $table->foreignId('carts_id')->nullable()->constrained();
            $table->date('expiration_date')->nullable();
            $table->foreignId('membership_types_id')->constrained();
            $table->foreignId('asigned_by')->constrained('users');
            $table->boolean('estatus_membresia')->default(0);



            // $table->string('reference_line');
            // $table->string('estatus')->default('PE');
            // $table->foreignId('memberships_id')->constrained();



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
        Schema::dropIfExists('memberships');
    }
}
