<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Options extends Controller
{
    public function index(){
        switch (auth()->user()->cargo) {
            case "Administrador":
                return view('admin');
                break;
            case "Tesorero":
                return view('tes');
                break;
            case "Contador":
                return view('cont');
                break;
            case "Encargado Logistica":
                return view('log');
                break;
        }
    }
}
