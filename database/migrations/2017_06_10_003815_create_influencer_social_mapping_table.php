<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfluencerSocialMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influencer_social_mapping', function (Blueprint $table) {
           
           $table->increments('id');//->index();
           $table->integer('influencer_id')->unsigned();
           $table->string('social_id');
           $table->integer('social_type')->unsigned();
           $table->string('access_token');
           $table->string('score')->nullable();
           
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
        Schema::dropIfExists('influencer_social_mapping');
    }
}
