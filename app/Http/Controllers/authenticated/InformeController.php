<?php

namespace App\Http\Controllers\authenticated;

use App\Exports\DexExport;
use App\Models\DEX\DEX;
use App\Models\Tipo_informe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

                    if ($input->datetime_inicial > $input->datetime_actual) {
                        $fail('Fecha inicial es mayor a la fecha actual');
                    }
                }
            ],
            'fecha_final' => [
                'required',
                function ($attribute, $value, $fail) use ($input) {
                    if ($input->datetime_final > $input->datetime_actual) {
                        $fail('Fecha final es mayor a la fecha actual');
                    }else{
                        if ($input->datetime_final < $input->datetime_inicial) {
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

//        $informe = Tipo_informe::find($input->informe);
//        foreach ($informe->datos_dex as $index => $dato){
//            foreach ($dex_encontrados as $dex){
//                $nombre = $dex->nombre;
//                unset($dex->$nombre);
//            }
//        }

        //dd($dex_encontrados);



        return Excel::download((new DexExport($dex_encontrados)), 'informe.xlsx');
        dd($dex_encontrados);
    }
}
