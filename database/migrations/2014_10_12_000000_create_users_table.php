<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
Users
    Columns:
    id              int
    name            string
    email           string
    password_hash   string
    password_plain  string
    superadmin      boolean
    shop_name       string
    remember_token  varchar(100)
    created_at      timestamp
    updated_at      timestamp
    card_brand      string
    card_last_four  string
    trial_ends_at   timestamp
    shop_domain     string
    is_enabled      boolean
    billing_plan    string
    trial_starts_at timestamp
 */
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
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password_hash');
            $table->string('password_plain');
            $table->boolean('superadmin');
            $table->string('shop_name');
            $table->rememberToken();
            $table->timestamps();

            $table->string('card_brand');
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->string('shop_domain');
            $table->boolean('is_enabled');
            $table->string('billing_plan');

            // Presumably they can not be in a trial so this would be null
            $table->timestamp('trial_starts_at')->nullable();
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
