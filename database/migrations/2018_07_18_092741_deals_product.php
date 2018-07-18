<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DealsProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');;
            $table->unsignedInteger('deals_id');
            //$table->string('description');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('deals_id')->references('id')->on('deals')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deals_product', function($table) {
            $table->dropIndex(['product_id']);
            $table->dropIndex(['deals_id']);
            $table->dropForeign(['deals_id']);
            $table->dropForeign(['product_id']);
            Schema::dropIfExists('product_category');
        });
    }
}
