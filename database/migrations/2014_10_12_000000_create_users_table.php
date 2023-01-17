<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surnames');

            $table->string('username')->nullable()->unique();
            $table->string('code_user')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('contact_phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->text('biometric_entry')->nullable();
            $table->string('path_perfil')->default('img/profile.png')->nullable()->comment('Estos datos se necesitan obligatorios al momento de crear el expediente');
            $table->string('ocupation')->nullable()->comment('Estos datos se necesitan obligatorios al momento de crear el expediente');
            $table->string('age')->nullable()->comment('Estos datos se necesitan obligatorios al momento de crear el expediente');
            $table->date('born')->nullable()->comment('Estos datos se necesitan obligatorios al momento de crear el expediente');
            $table->boolean('expediente')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
