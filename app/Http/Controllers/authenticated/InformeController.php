<?php

namespace App\Http\Controllers\authenticated;

use App\Exports\DexExport;
use App\Models\DEX\DEX;
use App\Models\Tipo_informe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class InformeController extends Controller
{
    public function generarInforme(Request $request)
    {

        $carbon = new Carbon();
        $date = $carbon->now();
        $date->format('d-m-Y');

        $input = (object)$request->input();

        $input->datetime_actual = $carbon->now()->format('d-m-Y');
        $input->datetime_inicial = Carbon::parse($input->fecha_inicial)->format('d-m-Y');
        $input->datetime_final = Carbon::parse($input->fecha_final)->format('d-m-Y');

        $array_files_validacion = [
            'informe' => ['required', 'exists:tipos_informe,id'],
            'fecha_inicial' => [
                'required',
                function ($attribute, $value, $fail) use ($input) {

                    if (strtotime($input->datetime_inicial) > strtotime($input->datetime_actual)) {
                        $fail('Rango de fecha invalido');
                        //$fail('Fecha inicial es mayor a la fecha actual');
                    }
                }
            ],
            'fecha_final' => [
                'required',
                function ($attribute, $value, $fail) use ($input) {
                    if (strtotime($input->datetime_final) > strtotime($input->datetime_actual)) {
                        //$fail('Rango de fecha invalido');
                        $fail('Fecha final es mayor a la fecha actual');
                    }else{
                        if (strtotime($input->datetime_final) < strtotime($input->datetime_inicial)) {
                            //$fail('Rango de fecha invalido');
                            $fail('Fecha final debe ser mayor o igual a la fecha Inicial');
                        }
                    }

                }
            ],
        ];

        $validator = Validator::make($request->all(), $array_files_validacion);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dex_encontrados = DEX::whereDate('fecha_dex','>=', $input->fecha_inicial)->whereDate('fecha_dex','<=', $input->fecha_final)->get();

        if(count($dex_encontrados) == 0){
            $this->setAlert('danger', 'Ningún DEX coincide con la fecha');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $atributos_informe = new Collection();
        $dex_filtrado = new Collection();
        $informe = Tipo_informe::find($input->informe);
        foreach ($informe->datos_dex as $index => $dato){
            $atributos_informe->push($dato->nombre);
        }
        foreach ($dex_encontrados as $dex){
            $dex = Collection::make($dex);
            $dex = $dex->intersectByKeys($atributos_informe->flip());

            if($informe->nombre == 'DEX_POR_CLIENTE'){
                $dex['total'] = $dex['valor'] - $dex['legalizacion'];
            }elseif ($informe->nombre == 'LEGALIZACIÓN DEX' || $informe->nombre == 'DEVOLUCIONES IVA'){
                $dex['diferencia'] = $dex['valor'] - $dex['valor_real_factura'];
            }
            $dex_filtrado->push($dex);
        }
        return Excel::download((new DexExport($dex_filtrado)), $informe->nombre.'.xlsx');
    }
}
