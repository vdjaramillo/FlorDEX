<?php

namespace App\Http\Controllers\authenticated;

use App\Models\DEX\Dato_dex;
use App\Models\Tipo_informe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Role;

class TipoInformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = null;
        $tipos_informe = Tipo_informe::all();
        if (isset($request->busqueda)) {
            $busqueda = $request->busqueda;
            if(is_numeric($request->busqueda)){
                $tipos_informe = Tipo_informe::where('id',$busqueda)->get();
                if(count($tipos_informe)==0){
                    $tipos_informe = Tipo_informe::all();
                    $this->setAlert('danger', 'Tipo de informe no encontrado');
                }
            }else{
                $this->setAlert('danger', 'Tipo de informe no encontrado');
            }
        }
        return view('authenticated.informes.index',compact('tipos_informe','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos_dex = Dato_dex::all();
        $roles = Role::all();
        return view('authenticated.informes.create',compact('datos_dex','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = (object) $request->input();
        $array_files_validacion = [
            'nombre' => ['required', 'unique:tipos_informe']
        ];
        $validator = Validator::make($request->all(), $array_files_validacion);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Se revisa que seleccionen al menos un visualizador
        $roles = Role::all();
        $count = 0;
        foreach ($roles as $rol){
            $id_input = 'rol'.$rol->id;
            if(!isset($input->$id_input)){
                $count++;
            }
        }
        if(count($roles) == $count){
            $this->setAlert('danger', 'Debes seleccionar al menos un tipo de usuario para ver el informe');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Se revisa que seleccione al menos un dato dex
        $datos_dex = Dato_dex::all();
        $count = 0;
        foreach ($datos_dex as $dato){
            $id_input = $dato->id;
            if(!isset($input->$id_input)){
                $count++;
            }
        }

        if(count($datos_dex) == $count){
            $this->setAlert('danger', 'Debes seleccionar al menos un dato dex');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Se guarda el tipo de informe
        $tipo_informe = (new Tipo_informe())->fill($request->input());


        if ($tipo_informe->save()) {
            foreach ($roles as $rol){
                $id = 'rol'.$rol->id;
                if(isset($input->$id)){
                    $tipo_informe->roles()->attach($rol->id);
                }
            }
            foreach ($datos_dex as $dato){
                $id = $dato->id;
                if(isset($input->$id)){
                    $tipo_informe->datos_dex()->attach($dato->id);
                }
            }


            $this->setAlert('success', 'Se ha guardado la información correctamente');
            return redirect(action('authenticated\TipoInformeController@index'));
        } else {
            $this->setAlert('danger', 'Error al guardar la información. Por favor intenta nuevamente.');
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_informe = Tipo_informe::find($id);
        $datos_dex = Dato_dex::all();
        $roles = Role::all();
        return view('authenticated.informes.edit',compact('tipo_informe','datos_dex','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = (object) $request->input();
        $tipo_informe = Tipo_informe::find($id);
        if ($tipo_informe) {
            $array_files_validacion = [
                'nombre' => ['required']
            ];
            if ($tipo_informe->nombre != $request->nombre) {
                array_push($array_files_validacion['nombre'], 'unique:tipos_informe');
            }
            $validator = Validator::make($request->all(), $array_files_validacion);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            //Se revisa que seleccionen al menos un visualizador
            $roles = Role::all();
            $count = 0;
            foreach ($roles as $rol){
                $id_input = 'rol'.$rol->id;
                if(!isset($input->$id_input)){
                    $count++;
                }
            }
            if(count($roles) == $count){
                $this->setAlert('danger', 'Debes seleccionar al menos un tipo de usuario para ver el informe');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //Se revisa que seleccione al menos un dato dex
            $datos_dex = Dato_dex::all();
            $count = 0;
            foreach ($datos_dex as $dato){
                $id_input = $dato->id;
                if(!isset($input->$id_input)){
                    $count++;
                }
            }

            if(count($datos_dex) == $count){
                $this->setAlert('danger', 'Debes seleccionar al menos un dato dex');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $tipo_informe->fill($request->input());
            if ($tipo_informe->save()) {
                $tipo_informe->datos_dex()->detach();
                $tipo_informe->roles()->detach();

                foreach ($roles as $rol){
                    $id = 'rol'.$rol->id;
                    if(isset($input->$id)){
                        $tipo_informe->roles()->attach($rol->id);
                    }
                }
                foreach ($datos_dex as $dato){
                    $id = $dato->id;
                    if(isset($input->$id)){
                        $tipo_informe->datos_dex()->attach($dato->id);
                    }
                }

                $this->setAlert('success', 'Se ha actualizado la información correctamente');

                return redirect(action('authenticated\TipoInformeController@index'));
            } else {
                $this->setAlert('danger', 'Error al guardar la información. Por favor intenta nuevamente.');
            }
        }
        $this->setAlert('danger', 'No se encuentra la información solicitada o no tienes permiso para acceder a ella');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_informe = Tipo_informe::find($id);
        if(!$tipo_informe){
            $this->setAlert('danger', 'No se encuentra la información solicitada o no tienes permiso para acceder a ella');
            return redirect()->back()->withInput();
        }

        if ($tipo_informe->delete()) {
            $this->setAlert('success', 'Se ha borrado correctamente el tipo de informe');
            return redirect(action('authenticated\TipoInformeController@index'));
        } else {
            $this->setAlert('error', 'Ha ocurrido un error. Por favor intenta de nuevo');
            return redirect()->back()->withInput();
        }
    }
}
