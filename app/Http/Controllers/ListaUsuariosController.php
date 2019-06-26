<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Users;

class ListaUsuariosController extends Controller
{
    public function index(){

        return view('listusr', ['users' => Users::all()]);

    }
    public function delete(){
        
    }
    public function edit($cc){
        return view('editusr', ['user'=> Users::findbycc($cc)]);
    }
   
    public function update(){
        $data=[
            'name'=>$_POST['name'],
            'cedula'=>$_POST['cedula'],
            'email'=>$_POST['email'],
            'cargo'=>$_POST['cargo'],
        ];
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'integer', 'integer', 'min:10000000'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'cargo' => ['required', 'string','in:Administrador,Tesorero,Contador,Encargado Logistica'],
            'password'=>[],
        ];  
        $user = Users::findorfail($_POST['id']);
        if(strcmp($user->cargo,$data['cargo'])!=0 and strcmp($user->cargo,"Administrador")==0){
            $users = Users::getbycargo($user->cargo);
            if(count($users)==1){
                return '<script>
                                alert("Debe existir al menos un Administrador en el sitio");
                                location.href="../lista-usuarios/";
                        </script>';
            }
        }
        if(strcmp($user->email,$data['email'])!=0){
            $rules['email']= ['required', 'string', 'email', 'max:255', 'unique:users'];
        }
        if(strcmp($user->cedula,$data['cedula'])!=0){
            $rules['cedula']= ['required', 'integer', 'integer', 'min:10000000', 'unique:users'];
        }
        if(! empty($_POST['password'])){
            $data['password']=($_POST['password']);
            $data['password_confirmation']=($_POST['password_confirmation']);
            $rules['password']= ['required', 'string', 'min:8', 'confirmed'];
        }
        $validator = Validator::make($data,$rules);
        if ($validator->fails())
        {
            // Algo esta mal
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }
        if(! empty($_POST['password'])){
            $data['password']=Hash::make($_POST['password']);
        }
        $user->update($data);
        return redirect('lista-usuarios');
    }
}
