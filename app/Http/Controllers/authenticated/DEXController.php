<?php
namespace App\Http\Controllers\authenticated;

use App\Models\Tipo_informe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\DEX\DEX;
use Spatie\Permission\Models\Role;

class DEXController extends Controller
{
    public function crear(){
        $rules=[
            'declaracion_de_cambio' => ['required','integer','min:0'],
            'fecha_dex' => ['required','string'],
            'vr_declaracion' => ['required','integer','min:0'],
            'fecha_presentacion' => ['required','date'],
            'numero_dex' => ['unique:dex','required','integer','min:0'],
            'fecha_aceptacion' => ['required','date'],
            'ciudad' => ['required','string'],
            'valor' => ['required','integer','min:0'],
            'manifiesto' => ['required','string'],
            'numero_factura' => ['required','integer','min:0'],
            'valor_factura' => ['required','integer','min:0'],
            'cliente' => ['required','string'],
            'fecha_embarque' => ['required','date'],
            'agencia' => ['required','string'],
        ];
        $validator = Validator::make($_POST, $rules);
        if ($validator->fails()) {
            // Algo esta mal
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        DEX::create($_POST);
        return view('authenticated.usuarios.log');
    }
    public function listar(){

        return view('authenticated.usuarios.contes',['dex'=>DEX::all(), 'tiposInforme' => Auth::user()->roles()->first()->tipos_informe]);
    }
    public function ver($dex){
        return view('authenticated.usuarios.editdex', ['dex' => DEX::findbynumdex($dex)]);
    }
    public function editar(){

    }
    public function legalizar(){

    }
    public function informe(){
    }
}
