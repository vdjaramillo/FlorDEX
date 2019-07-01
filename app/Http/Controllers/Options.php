<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Options extends Controller
{
    public function index(){
        switch (auth()->user()->cargo) {
            case "Administrador":
                return view('authenticated.usuarios.admin');
                break;
            case "Tesorero":
                return view('authenticated.usuarios.tes');
                break;
            case "Contador":
                return view('authenticated.usuarios.cont');
                break;
            case "Encargado Logistica":
                return view('authenticated.usuarios.log');
                break;
        }
    }
}
