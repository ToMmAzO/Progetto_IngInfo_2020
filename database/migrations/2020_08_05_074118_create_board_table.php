<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->bigIncrements('board_id');
            $table->bigIncrements('room_id');
            $table->integer('battery_level');
            $table->string('location');
            $table->boolean('indoor');
            $table->string('operative_mode');

            $table->primary('board_id');
            $table->foreign('room_id')->references('room_id')->on('room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board');
    }
}
