<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoInformeRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_informe_rol', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('rol_id')->unsigned();
            $table->unsignedInteger('tipo_informe_id');
            $table->timestamps();

            $table->foreign('rol_id')
                ->references('id')
                ->on('roless')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tipo_informe_id')
                ->references('id')
                ->on('tipos_informe')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['rol_id', 'tipo_informe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_informe_rol');
    }
}
