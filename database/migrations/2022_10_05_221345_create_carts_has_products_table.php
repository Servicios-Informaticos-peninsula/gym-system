<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts_has_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carts_id')->constrained();
            $table->foreignId('products_id')->constrained();
            $table->integer('quantity');
            $table->boolean('lMembresia');
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
        Schema::dropIfExists('carts_has_products');
    }
}
