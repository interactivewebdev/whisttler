<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfluencerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('influencer_details', function (Blueprint $table) {
           $table->increments('id');//->index();
           $table->integer('user_id')->unsigned()->nullable();
           $table->integer('category_id')->unsigned()->nullable();//->index();
           $table->integer('sub_category_id')->unsigned()->nullable();
           $table->string('social_id')->nullable();
           $table->integer('social_type')->unsigned();
           
           $table->text('access_token ')->nullable();
           $table->text('profile_pic_path')->nullable();
            
           $table->boolean('status')->default(1);
           $table->timestamp('created_at')->nullable();
           $table->datetime('updated_at')->nullable();
           
           $table->foreign('category_id')->references('id')->on('categories');
           $table->foreign('user_id')->references('id')->on('users');
           $table->foreign('social_type')->references('id')->on('social_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('influencer_details');
    }
}
