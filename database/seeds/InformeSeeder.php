<?php

use Illuminate\Database\Seeder;

class InformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informe = \App\Models\Tipo_informe::create(['nombre' => 'DEX_POR_CLIENTE']);
        $informe->datos_dex()->attach(12);
        $informe->datos_dex()->attach(5);
        $informe->datos_dex()->attach(8);
        $informe->datos_dex()->attach(14);
        $informe->datos_dex()->attach(2);
        $informe->datos_dex()->attach(13);
        $informe->datos_dex()->attach(15);
        $informe->roles()->attach(3);


        $informe = \App\Models\Tipo_informe::create(['nombre' => 'LEGALIZACIÓN DEX']);
        $informe->datos_dex()->attach(1);
        $informe->datos_dex()->attach(2);
        $informe->datos_dex()->attach(3);
        $informe->datos_dex()->attach(4);
        $informe->datos_dex()->attach(5);
        $informe->datos_dex()->attach(6);
        $informe->datos_dex()->attach(7);
        $informe->datos_dex()->attach(8);
        $informe->datos_dex()->attach(9);
        $informe->datos_dex()->attach(16);
        $informe->roles()->attach(3);
        $informe->roles()->attach(4);

        $informe = \App\Models\Tipo_informe::create(['nombre' => 'DEVOLUCIONES IVA']);
        $informe->datos_dex()->attach(10);
        $informe->datos_dex()->attach(11);
        $informe->datos_dex()->attach(12);
        $informe->datos_dex()->attach(5);
        $informe->datos_dex()->attach(8);
        $informe->datos_dex()->attach(14);
        $informe->datos_dex()->attach(2);
        $informe->datos_dex()->attach(13);
        $informe->datos_dex()->attach(16);
        $informe->roles()->attach(4);
    }
}
