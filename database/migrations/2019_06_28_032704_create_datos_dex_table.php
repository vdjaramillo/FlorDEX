<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosDexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_dex', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('tipo');
            $table->timestamps();
        });

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Declaracion de cambio',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Fecha_DEX',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Vr_Declaracion',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Fecha_Presentacion',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Número_DEX',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Fecha_Aceptación',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Ciudad',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Valor',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Manifiesto',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Número_Factura',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Valor_Factura',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Cliente',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Fecha_Embarque',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'Agencia',
            'tipo' => 'string',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_dex');
    }
}
