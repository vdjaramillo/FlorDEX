<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_datos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dato_dex_id');
            $table->unsignedInteger('tipo_informe_id');
            $table->timestamps();

            $table->foreign('dato_dex_id')
                ->references('id')
                ->on('datos_dex')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tipo_informe_id')
                ->references('id')
                ->on('tipos_informe')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['dato_dex_id', 'tipo_informe_id']);
        });

        $informe = \App\Models\Tipo_informe::create(['nombre' => 'DEX_POR_CLIENTE']);
        $informe->datos_dex()->attach(12);
        $informe->datos_dex()->attach(5);
        $informe->datos_dex()->attach(8);
        $informe->datos_dex()->attach(14);
        $informe->datos_dex()->attach(2);
        $informe->datos_dex()->attach(13);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_datos');
    }
}
