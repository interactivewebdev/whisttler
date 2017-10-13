<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('subscription_plan', function (Blueprint $table) {
           $table->increments('id');//->index();
           $table->string('plan_name');//->index();
           $table->string('amount');
           $table->string('time_period');
           $table->boolean('status')->default(1);
           $table->timestamp('created_at')->nullable();
           
           
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_plan');
    }
}
