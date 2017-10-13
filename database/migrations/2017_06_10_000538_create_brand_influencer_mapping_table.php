<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandInfluencerMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_influencer_mapping', function (Blueprint $table) {
           $table->increments('id');//->index();
           $table->integer('brand_id')->unsigned();//->index();
           $table->integer('influencer_id')->unsigned();
           $table->integer('is_main')->default(1);
           
           $table->boolean('status')->default(1);
           $table->timestamp('created_at')->nullable();
           
           
            $table->foreign('brand_id')->references('id')->on('users');
            $table->foreign('influencer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_influencer_mapping');
    }
}
