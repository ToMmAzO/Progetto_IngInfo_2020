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
            $table->double('accuracy');
            $table->timestamp('response_time');
            $table->double('value_op_max');
            $table->double('value_op_min');

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
