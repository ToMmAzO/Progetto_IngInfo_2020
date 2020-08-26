<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building', function (Blueprint $table) {
            $table->bigIncrements('building_id');
            $table->unsignedBigInteger('weather_station_id');
            $table->integer('floors_number');
            $table->integer('rooms_number');
            $table->string('address');
            $table->integer('construction_year');

            $table->foreign('weather_station_id')->references('weather_station_id')->on('weather_station');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building');
    }
}
