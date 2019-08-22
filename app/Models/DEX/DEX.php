<?php

namespace App\Models\DEX;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DEX extends Model
{
    protected $table = 'dex';
    protected $primaryKey = 'id';
    protected $fillable = [
        'declaracion_de_cambio',
           'fecha_dex',
            'vr_declaracion',
            'fecha_presentacion',
            'numero_dex',
            'fecha_aceptacion',
            'ciudad',
            'valor',
            'manifiesto',
            'numero_factura',
            'valor_factura',
            'cliente',
            'fecha_embarque',
            'agencia',
            'legalizacion',
            'valor_real_factura',
    ];

    public static function findbynumdex($dex){
        return DB::table('dex')->where('numero_dex', $dex)->first();
    }
}
