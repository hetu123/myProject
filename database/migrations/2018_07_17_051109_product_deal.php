<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductDeal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_deal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');;
            $table->unsignedInteger('deal_id');
            //$table->string('description');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_category', function($table) {
            $table->dropIndex(['product_id']);
            $table->dropIndex(['deal_id']);
            $table->dropForeign(['deal_id']);
            $table->dropForeign(['product_id']);
            Schema::dropIfExists('product_category');
        });
    }
}
