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
            'nombre' => 'declaracion_de_cambio',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'fecha_dex',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'vr_declaracion',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'fecha_presentacion',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'numero_dex',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'fecha_aceptacion',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'ciudad',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'valor',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'manifiesto',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'numero_factura',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'valor_factura',
            'tipo' => 'number',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'cliente',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'fecha_embarque',
            'tipo' => 'date',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'agencia',
            'tipo' => 'string',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'legalizacion',
            'tipo' => 'float',
        ]);

        \App\Models\DEX\Dato_dex::create([
            'nombre' => 'valor_real_factura',
            'tipo' => 'float',
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
