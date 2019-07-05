<?php

namespace App\Http\Controllers\authenticated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Users;

class ListaUsuariosController extends Controller
{
    public function index(){

        return view('authenticated.usuarios.list', ['users' => Users::all()]);

    }
    public function delete($cc){
        $user = Users::findbycc($cc);
        if(strcmp($user->cargo,"Administrador")==0){
            $users = Users::getbycargo($user->cargo);
            if(count($users)==1){
                return '<script>
                                alert("Debe existir al menos un Administrador en el sitio");
                                location.href="'.route('lista-usuarios').'";
                        </script>';
            }
        }
        Users::destroy($user->id);
        return redirect('usuario/lista');    
        
    }
    public function edit($cc){
        return view('authenticated.usuarios.edit', ['user'=> Users::findbycc($cc)]);
    }
   public function search(){
    if(empty($_POST['busq'])){
        return '<script>
        alert("El campo cédula no puede estar vacío");
        location.href="'.route('lista-usuarios').'";
        </script>';
    }
    $user = Users::findbycc($_POST['busq']);
    if(is_null($user)){
         return '
        <script>
        var bool=confirm("La cédula ingresada no se encuentra registrada. \n ¿desea registrar un nuevo usuario? ");
                if(bool){
                    location.href="'.route('register').'";
                }else{
                    location.href="'.route('lista-usuarios').'";
                }
        </script>
        ';
    }else{
        return view('authenticated.usuarios.list', ['users' => [$user]]);
    }
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
                                location.href="'.route('lista-usuarios').'";
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
        return redirect('usuario/lista');
    }
}
