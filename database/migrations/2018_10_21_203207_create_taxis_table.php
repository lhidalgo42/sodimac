<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('capacity')->default(4);
            $table->dateTime('departure');
            $table->string('travel_time');
            $table->integer('origin_id');
            $table->integer('destination_id');
            $table->integer('user_id');
            $table->integer('distance');
            $table->timestamps();
        });
        Schema::create('taxi_user',function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('taxi_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxis');
        Schema::dropIfExists('taxi_user');
    }
}
