<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_users', function (Blueprint $table) {
            $table->integer('users_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('products_users', function($table) {
            $table->foreign('users_id')->references('id')->on('users')->onDelete('NO ACTION');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('NO ACTION');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_users');
    }

}
