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
            $table->text('description')->nullable();
            $table->foreignId('product_units_id')->constrained();
            $table->foreignId('providers_id')->nullable()->constrained();
            $table->foreignId('category_products_id')->nullable()->constrained();
            $table->boolean('requireInventory')->default(false);
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
