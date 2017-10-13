<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify_email', function (Blueprint $table) {
           
           $table->increments('id');//->index();
           $table->string('email');
           $table->string('code');
           $table->boolean('is_verified')->default(0);
           $table->timestamp('created_at')->nullable();
           $table->datetime('updated_at')->nullable();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verify_email');   
    }
}
