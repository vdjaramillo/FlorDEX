<?php

namespace App\Http\Controllers\authenticated;

use App\Models\DEX\Dato_dex;
use App\Models\Tipo_informe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TipoInformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_informe = Tipo_informe::all();
        return view('authenticated.informes.index',compact('tipos_informe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos_dex = Dato_dex::all();
        return view('authenticated.informes.create',compact('datos_dex'));
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

        if(count((array)$input) == 2){
            //Se debe enviar un mensaje que debe seleccionar al menos un un dato
            $this->setAlert('danger', 'Debes seleccionar al menos un dato');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Se guarda el tipo de informe
        $tipo_informe = (new Tipo_informe())->fill($request->input());


        if ($tipo_informe->save()) {
            $datos_dex = Dato_dex::all();
            foreach ($datos_dex as $dato){
                $nombre = $dato->nombre;
                if(isset($input->$nombre)){
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

        return view('authenticated.informes.edit',$tipo_informe);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
