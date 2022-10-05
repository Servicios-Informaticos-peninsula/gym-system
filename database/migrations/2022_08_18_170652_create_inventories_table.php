<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity');
            $table->integer('minimum_alert')->nullable();
            $table->integer('maximun_alert')->nullable();
            $table->double('purchase_price')->nullable();
            $table->double('sales_price')->nullable();
            $table->foreignId('asigned_by')->constrained('users');
            $table->foreignId('products_id')->constrained();
            $table->enum('status', ['Solicitado', 'Comprado', 'Empaquetado', 'En camino', 'Disponible'])->default('Solicitado');
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
        Schema::dropIfExists('inventories');
    }
}
