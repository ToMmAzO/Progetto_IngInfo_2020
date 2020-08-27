<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComfortFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comfort_feedback', function (Blueprint $table) {
            $table->bigIncrements('comfort_feedback_id');
            $table->unsignedBigInteger('room_id');
            $table->double('temperature');
            $table->double('humidity');
            $table->double('lighting');
            $table->double('air_quality');
            $table->timestamp('time');

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
        Schema::dropIfExists('room');
    }
}
