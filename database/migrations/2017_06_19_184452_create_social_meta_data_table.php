<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_meta_data', function (Blueprint $table) {
           
           $table->increments('id');//->index();
           $table->integer('influencer_id')->unsigned();
           $table->integer('social_type')->unsigned();
           $table->string('meta_key');
           $table->string('meta_value');

           $table->boolean('status')->default(1);
           $table->timestamp('created_at')->nullable();
           $table->datetime('updated_at')->nullable();
           
           $table->foreign('influencer_id')->references('id')->on('users');
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
        
        Schema::dropIfExists('social_meta_data');   
        
    }
}
