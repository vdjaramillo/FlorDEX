<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('cedula')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('cargo',['Administrador','Tesorero','Contador','Encargado Logistica']);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        \App\User::create([
            'name' => 'administrador',
            'email' => 'administrador@unal.edu.co',
            'cedula' => 102931,
            'cargo' => 'Administrador',
            'password' => 123,
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
