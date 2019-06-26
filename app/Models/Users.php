<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $fillable = [
        'name', 'cedula', 'email', 'password', 'cargo',
    ];
    public static function findbycc($cc){
        return DB::table('users')->where('cedula', $cc)->first();
    }
    public static function getbycargo(String $cargo){
        return DB::table('users')->where('cargo', $cargo)->get();
    }
}
