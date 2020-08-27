<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->bigIncrements('room_id');
            $table->unsignedBigInteger('building_id');
            $table->string('intended_usage');
            $table->string('main_orientation');
            $table->string('location');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->integer('area');
            $table->integer('volume');
            $table->integer('windows_number');
            $table->integer('total_surface');
            $table->integer('glazing_surface');
            $table->integer('capacity');
            $table->integer('latitude');
            $table->integer('longitude');

            $table->foreign('building_id')->references('building_id')->on('building');
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
