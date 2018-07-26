<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');;
            $table->unsignedInteger('category_id');
            //$table->string('description');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_product', function($table) {
            $table->dropIndex(['product_id']);
            $table->dropIndex(['category_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_id']);
            Schema::dropIfExists('product_category');
        });
    }
}
