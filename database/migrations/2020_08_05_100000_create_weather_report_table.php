<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_report', function (Blueprint $table) {
            $table->unsignedBigInteger('weather_station_id');
            $table->timestamp('time');
            $table->string('climatic_condition');
            $table->double('visibility');
            $table->double('pressure');
            $table->double('temperature');
            $table->double('humidity');

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
        Schema::dropIfExists('room');
    }
}
