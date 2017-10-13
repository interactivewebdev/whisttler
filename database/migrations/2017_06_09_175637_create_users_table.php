<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('role_type');
            $table->string('user_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email','255')->nullable();
            $table->string('password')->nullable();
            $table->integer('login_with')->comment('social media name')->unsigned()->nullable();
            $table->string('phone_number')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('login_with')->references('id')->on('social_type');
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
