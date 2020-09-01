<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalDimensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_dimension', function (Blueprint $table) {
            $table->bigIncrements('physical_dimension_id');
            $table->string('name');
            $table->string('description');
            $table->string('unit_of_measure');
            $table->unsignedBigInteger('sensor_id');

            $table->foreign('sensor_id')->references('sensor_id')->on('sensor');

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
