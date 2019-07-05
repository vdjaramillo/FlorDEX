@extends('authenticated.usuarios.admin')
@section('contenido')
@includeIf('repository.alerts')
<form action="{{ route('lista-usuarios') }}" method="POST">
    @csrf
    <input name="busq" required class="col-form-label form-control" type="text" placeholder="Buscar por cédula" />
    <input value="Buscar" type="submit" class="btn btn-secondary"/>
</form>
<div class="card">
    @if(count($tipos_informe)>0)
        <table class="table-hover">
            <thead>
                <th scope="col">Nombre</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                @foreach ($tipos_informe as $informe)
                <tr>
                    <td>{{$informe->nombre}}</td>
                    <td>
                        <a href="{{route('tipo_informes_edit',['$id' => $informe->id])}}" class="oi oi-pencil"></a>
                        <form id="borrar_{{$informe->id}}" style="display: none;"
                              action="{{ route('tipo_informe_delete',['$id' => $informe->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                        </form>
                        <a title="Eliminar" onclick="borrar_{{$informe->id}}.submit()" class="oi oi-trash"></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>No hay Tipos de Informe registrados en el sistema</h3>
    @endif
</div>
@endsection
