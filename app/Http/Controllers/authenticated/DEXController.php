<?php
namespace App\Http\Controllers\authenticated;

use App\Models\Tipo_informe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\DEX\DEX;

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
        $dex = DEX::all();
        if(count($dex)==0){
            echo '<script>alert("No hay DEX registrados en el sistema")</script>';
        }
        return view('authenticated.usuarios.contes',['dex'=>$dex, 'tiposInforme' => Auth::user()->roles()->first()->tipos_informe]);
    }
    public function buscar(){
        $dex = DEX::getbycliente($_POST['busq']);
        if($_POST['busq']==""){
            return view('authenticated.usuarios.contes',['dex'=>DEX::all(), 'tiposInforme' => Auth::user()->roles()->first()->tipos_informe]);
        }
        if(count($dex)==0){
            echo '<script>alert("DEX no encontrado")</script>';
            return view('authenticated.usuarios.contes',['dex'=>DEX::all(), 'tiposInforme' => Auth::user()->roles()->first()->tipos_informe]);
        }else{
            return view('authenticated.usuarios.contes',['dex'=>$dex, 'tiposInforme' => Auth::user()->roles()->first()->tipos_informe]);
        }
       
    }
    public function ver($dex){
        return view('authenticated.usuarios.editdex', ['dex' => DEX::findbynumdex($dex)]);
    }
    public function editar($dex){
        //logica editar dex para contador 
        if(array_key_exists('editar', $_POST)){
            $data['declaracion_de_cambio'] = $_POST['declaracion_de_cambio'];
            $data['fecha_dex'] = $_POST['fecha_dex'];
            $data['vr_declaracion'] = $_POST['vr_declaracion'];
            $data['fecha_presentacion'] = $_POST['fecha_presentacion'];
            $data['numero_dex'] = $_POST['numero_dex'];
            $data['fecha_aceptacion'] = $_POST['fecha_aceptacion'];
            $data['ciudad'] = $_POST['ciudad'];
            $data['valor'] = $_POST['valor'];
            $data['manifiesto'] = $_POST['manifiesto'];
            $data['numero_factura'] = $_POST['numero_factura'];
            $data['valor_factura'] = $_POST['valor_factura'];
            $data['cliente'] = $_POST['cliente'];
            $data['fecha_embarque'] = $_POST['fecha_embarque'];
            $data['agencia'] = $_POST['agencia'];
                      
            $rules['declaracion_de_cambio'] = ['required','integer','min:0'];
            $rules['fecha_dex'] = ['required','string'];
            $rules['vr_declaracion'] = ['required','integer','min:0'];
            $rules['fecha_presentacion'] = ['required','date'];
            $rules['numero_dex'] = ['unique:dex','required','integer','min:0'];
            $rules['fecha_aceptacion'] = ['required','date'];
            $rules['ciudad'] = ['required','string'];
            $rules['valor'] = ['required','integer','min:0'];
            $rules['manifiesto'] = ['required','string'];
            $rules['numero_factura'] = ['required','integer','min:0'];
            $rules['valor_factura'] = ['required','integer','min:0'];
            $rules['cliente'] = ['required','string'];
            $rules['fecha_embarque'] = ['required','date'];
            $rules['agencia'] = ['required','string'];
            $rules['legalizacion'] = ['required','integer','min:0'];
            $rules['valor_real_factura'] = ['required','integer','min:0']; 

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
            // Algo esta mal
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }
            DEX::where('numero_dex', $dex)->update($data);
        }
       
        return redirect()->route('listar-dex');
    }
    public function legalizar($dex){
        //editar y legalizar dex para tesorero
        $data = [
            'legalizacion' => $_POST['legalizacion'],
            'valor_real_factura' => $_POST['valor_real_factura'],
        ];
        $rules =[
            'legalizacion' => ['required','integer','min:0'],
            'valor_real_factura' => ['required','integer','min:0'],    
        ];
        if(array_key_exists('editar', $_POST)){
            $data['declaracion_de_cambio'] = $_POST['declaracion_de_cambio'];
            $data['fecha_dex'] = $_POST['fecha_dex'];
            $data['vr_declaracion'] = $_POST['vr_declaracion'];
            $data['fecha_presentacion'] = $_POST['fecha_presentacion'];
            $data['numero_dex'] = $_POST['numero_dex'];
            $data['fecha_aceptacion'] = $_POST['fecha_aceptacion'];
            $data['ciudad'] = $_POST['ciudad'];
            $data['valor'] = $_POST['valor'];
            $data['manifiesto'] = $_POST['manifiesto'];
            $data['numero_factura'] = $_POST['numero_factura'];
            $data['valor_factura'] = $_POST['valor_factura'];
            $data['cliente'] = $_POST['cliente'];
            $data['fecha_embarque'] = $_POST['fecha_embarque'];
            $data['agencia'] = $_POST['agencia'];
                      
            $rules['declaracion_de_cambio'] = ['required','integer','min:0'];
            $rules['fecha_dex'] = ['required','string'];
            $rules['vr_declaracion'] = ['required','integer','min:0'];
            $rules['fecha_presentacion'] = ['required','date'];
            $rules['numero_dex'] = ['unique:dex','required','integer','min:0'];
            $rules['fecha_aceptacion'] = ['required','date'];
            $rules['ciudad'] = ['required','string'];
            $rules['valor'] = ['required','integer','min:0'];
            $rules['manifiesto'] = ['required','string'];
            $rules['numero_factura'] = ['required','integer','min:0'];
            $rules['valor_factura'] = ['required','integer','min:0'];
            $rules['cliente'] = ['required','string'];
            $rules['fecha_embarque'] = ['required','date'];
            $rules['agencia'] = ['required','string'];
            $rules['legalizacion'] = ['required','integer','min:0'];
            $rules['valor_real_factura'] = ['required','integer','min:0']; 

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
            // Algo esta mal
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }
            
        }
        DEX::where('numero_dex', $dex)->update($data);
        return redirect()->route('listar-dex2');
    }
}
