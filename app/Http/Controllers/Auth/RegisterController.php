<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
 * Handle a registration request for the application.
 *gygyg
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return redirect($this->redirectPath());   public function __construct()
    {
            $this->middleware('role:Administrador');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'integer', 'integer', 'min:10000000', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cargo' => ['required', 'string','in:Administrador,Tesorero,Contador,Encargado Logistica'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'cargo' => $data['cargo'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
