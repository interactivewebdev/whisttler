<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_type', function (Blueprint $table) {
           
           $table->increments('id');
           $table->string('name');
           $table->boolean('status')->default(0);
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
       Schema::dropIfExists('industry_type');  
    }
}
