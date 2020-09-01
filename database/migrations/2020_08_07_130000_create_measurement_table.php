<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurement', function (Blueprint $table) {
            $table->timestamp('time');
            $table->double('value');
            $table->unsignedBigInteger('physical_dimension_id');

            $table->primary(['physical_dimension_id', 'time']);
            $table->foreign('physical_dimension_id')->references('physical_dimension_id')->on('physical_dimension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurement');
    }
}
