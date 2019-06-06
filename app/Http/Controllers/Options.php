<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Options extends Controller
{
    public function index(){
       if(strcmp (auth()->user()->cargo , "Administrador" ) == 0){
            echo('<script>alert("Bienvenido Administrador '.e(auth()->user()->name).'")</script>');
            return view('main');
        }else{
            echo('<script>alert("Bienvenido '.e(auth()->user()->cargo).'")</script>');
        }
    }
}
