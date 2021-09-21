<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**

Products
    Columns:
        id int
        product_name string
        description text
        style text
        brand text
        created_at timestamp
        updated_at timestamp
        url string
        product_type string
        shipping_price int
        note text
        admin_id int
 *
 */
class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->text('description');
            $table->text('style');
            $table->text('brand');
            $table->timestamps();
            $table->string('url');
            $table->string('product_type');
            $table->integer('shipping_price');
            $table->text('note');
            $table->integer('admin_id')->nullable(); // This is presumably a schema leftover
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
