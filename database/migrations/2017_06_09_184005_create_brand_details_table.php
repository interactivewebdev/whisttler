<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_details', function (Blueprint $table) {
           $table->increments('id');//->index();
           $table->integer('user_id')->unsigned()->nullable();
           $table->integer('industry_type');
           $table->string('brand_name')->nullable();//->index();
           $table->integer('category_id')->unsigned()->nullable();//->index();
           $table->integer('subscription_id')->unsigned()->nullable();;
           $table->boolean('status')->default(1);
           $table->timestamp('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
           $table->foreign('subscription_id')->references('id')->on('subscription_plan');
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
        Schema::dropIfExists('brand_details');
    }
}
