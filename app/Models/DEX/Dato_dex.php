<?php

namespace App\Models\DEX;

use Illuminate\Database\Eloquent\Model;

class Dato_dex extends Model
{
    protected $table = 'datos_dex';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'tipo'
    ];

    public function tipos_informe()
    {
        return $this->belongsToMany('App\Models\Tipo_informe','informe_datos','dato_dex_id', 'tipo_informe_id')->withTimestamps();
    }
}
