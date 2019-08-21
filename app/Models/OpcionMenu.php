<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OpcionMenu extends Model
{
    protected $table = 'menu_items';
    protected $fillable = [
        'titulo',
        'url',
        'nombre_ruta',
        'permission_id',
        'parent_id',
        'active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hijos()
    {
        return $this->hasMany('App\Models\OpcionMenu', 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function padre()
    {
        return $this->belongsTo('App\Models\OpcionMenu', 'parent_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

}
