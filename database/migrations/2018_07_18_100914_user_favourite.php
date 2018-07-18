<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFavourite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_favourite', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');;
            $table->unsignedInteger('user_id');
            //$table->string('description');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_favourite', function($table) {
            $table->dropIndex(['product_id']);
            $table->dropIndex(['user_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['product_id']);
            Schema::dropIfExists('product_category');
        });
    }
}
