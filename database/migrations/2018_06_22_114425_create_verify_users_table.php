<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('verify_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });*/
        Schema::create('verify_users', function (Blueprint $table) {
          //  $table->integer('user_id');
            $table->unsignedInteger('user_id');
            $table->string('token');
            $table->timestamps();
           //$table->integer('user_id')->unsigned()->index();
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verify_users', function($table) {
            $table->dropIndex(['user_id']);
            $table->dropForeign(['user_id']);
            Schema::dropIfExists('verify_users');
        });
    }
}
