<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrderTable
Orders
    Columns:
        id int
        product_id int
        street_address text
        apartment text
        city text
        state text
        country_code string
        zip text
        phone_number string
        email text
        name string
        order_status string
        payment_ref text
        transaction_id string
        payment_amt_cents int
        ship_charged_cents int
        ship_cost_cents int
        subtotal_cents int
        total_cents int
        shipper_name text
        payment_date timestamp
        shipped_date timestamp
        tracking_number text
        tax_total_cents int
        created_at timestamp
        updated_at timestamp
 */
class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->text('street_address');
            $table->text('apartment');
            $table->text('city');
            $table->text('state');
            $table->string('country_code');
            $table->text('zip');
            $table->string('phone_number');
            $table->text('email');
            $table->string('name');
            $table->string('order_status');
            $table->text('payment_ref');
            $table->string('transaction_id');
            $table->integer('payment_amt_cents');
            $table->integer('ship_charged_cents');
            $table->integer('ship_cost_cents');
            $table->integer('subtotal_cents');
            $table->integer('total_cents');
            $table->text('shipper_name');

            // Presumably orders can be created before they're paid/shipped
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->text('tracking_number');
            $table->integer('tax_total_cents');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
