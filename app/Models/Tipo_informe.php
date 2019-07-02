<?php

namespace App\Models;
//use App\
use Illuminate\Database\Eloquent\Model;

class Tipo_informe extends Model
{
    protected $table = 'tipos_informe';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
    ];

    public function datos_dex()
    {
        return $this->belongsToMany('App\Models\DEX\Dato_dex','informe_datos','tipo_informe_id', 'dato_dex_id')->withTimestamps();
    }
}
