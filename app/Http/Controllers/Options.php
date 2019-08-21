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
                return redirect('/dex/listar');
                break;
            case "Contador":
                return redirect('/dex/listar');
                break;
            case "Encargado Logistica":
                return view('authenticated.usuarios.log');
                break;
        }
    }
}
