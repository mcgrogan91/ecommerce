<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**

Inventory
    Columns:
        id int
        product_id int
        quantity int
        color text
        size text
        weight double
        price_cents int
        sale_price_cents int
        cost_cents int
        sku string
        length double
        width double
        height double
        note text
 */
class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity');
            $table->text('color');
            $table->text('size');
            $table->double('weight');
            $table->integer('price_cents');
            $table->integer('sale_price_cents');
            $table->integer('cost_cents');
            $table->string('sku');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->text('note');

            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
