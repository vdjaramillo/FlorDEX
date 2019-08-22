<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'roless';
    protected $fillable = [
        'name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function tipos_informe()
    {
        return $this->belongsToMany('App\Models\Tipo_informe','tipo_informe_rol','rol_id', 'tipo_informe_id')
            ->withTimestamps();
    }
}
