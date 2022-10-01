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
            $table->foreignId('products_id')->constrained();
            $table->integer('quantity');
            $table->integer('minimum_alert');
            $table->integer('maximun_alert');
            $table->double('purchase_price')->nullable();
            $table->double('sales_price')->nullable();
            $table->foreignId('asigned_by')->constrained('users');
            $table->string('status_sale');
            $table->string('status_envio');

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
