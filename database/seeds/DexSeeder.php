<?php

use Illuminate\Database\Seeder;

class DexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DEX\DEX::create([
            'declaracion_de_cambio' => 5,
            'fecha_dex' => '2019-02-05',
            'vr_declaracion' => 20,
            'fecha_presentacion' => '2019-02-05',
            'numero_dex' => 1,
            'fecha_aceptacion' => '2019-02-05',
            'ciudad' => 'Rionegro',
            'valor' => 200000,
            'manifiesto' => 'N/A',
            'numero_factura' => 44445,
            'valor_factura' => 4571,
            'cliente' => 'David',
            'fecha_embarque' => '2019-02-05',
            'agencia' => 'Luna',
        ]);

        \App\Models\DEX\DEX::create([
            'declaracion_de_cambio' => 6,
            'fecha_dex' => '2019-02-05',
            'vr_declaracion' => 7,
            'fecha_presentacion' => '2019-02-06',
            'numero_dex' => 2,
            'fecha_aceptacion' => '2019-02-06',
            'ciudad' => 'Rionegro',
            'valor' => 200000,
            'manifiesto' => 'N/A',
            'numero_factura' => 44448,
            'valor_factura' => 4572,
            'cliente' => 'David',
            'fecha_embarque' => '2019-02-06',
            'agencia' => 'Luna',
        ]);

        \App\Models\DEX\DEX::create([
            'declaracion_de_cambio' => 7,
            'fecha_dex' => '2019-02-06',
            'vr_declaracion' => 5,
            'fecha_presentacion' => '2019-02-07',
            'numero_dex' => 3,
            'fecha_aceptacion' => '2019-02-04',
            'ciudad' => 'Rionegro',
            'valor' => 200000,
            'manifiesto' => 'N/A',
            'numero_factura' => 44449,
            'valor_factura' => 4573,
            'cliente' => 'David',
            'fecha_embarque' => '2019-02-07',
            'agencia' => 'Luna',
        ]);

        \App\Models\DEX\DEX::create([
            'declaracion_de_cambio' => 8,
            'fecha_dex' => '2019-02-07',
            'vr_declaracion' => 55,
            'fecha_presentacion' => '2019-02-08',
            'numero_dex' => 3,
            'fecha_aceptacion' => '2019-02-08',
            'ciudad' => 'Rionegro',
            'valor' => 200000,
            'manifiesto' => 'N/A',
            'numero_factura' => 44450,
            'valor_factura' => 4574,
            'cliente' => 'David',
            'fecha_embarque' => '2019-02-08',
            'agencia' => 'Luna',
        ]);


    }
}
