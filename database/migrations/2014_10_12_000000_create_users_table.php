<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codPersona')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('surname');
            $table->timestamp('birthday');
            $table->string('email');
            //$table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'codPersona' => '10605041',
            'password' => Hash::make('segretissima'),
            'name' => 'Marco',
            'surname' => 'Riva',
            'email'=>'marco20.riva@mail.polimi.it'
        ]);

        DB::table('users')->insert([
            'codPersona' => '10572283',
            'password' => Hash::make('password'),
            'name' => 'Tommaso',
            'surname' => 'Pozzi',
            'email'=>'tommaso4.pozzi@mail.polimi.it'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
