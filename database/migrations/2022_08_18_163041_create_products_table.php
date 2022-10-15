<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('bar_code')->unique();
            $table->string('name')->unique();
            $table->foreignId('product_units_id')->constrained();
            $table->text('description')->nullable();
            $table->foreignId('providers_id')->constrained();
            $table->boolean('requireInventory')->default(false);
            $table->foreignId('category_products_id')->constrained();
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
        Schema::dropIfExists('products');
    }
}
