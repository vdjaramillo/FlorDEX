<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dex', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('declaracion_de_cambio');
            $table->date('fecha_dex');
            $table->integer('vr_declaracion');
            $table->date('fecha_presentacion');
            $table->integer('numero_dex');
            $table->date('fecha_aceptacion');
            $table->string('ciudad');
            $table->integer('valor');
            $table->string('manifiesto');
            $table->integer('numero_factura');
            $table->integer('valor_factura');
            $table->string('cliente');
            $table->date('fecha_embarque');
            $table->string('agencia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dex');
    }
}
