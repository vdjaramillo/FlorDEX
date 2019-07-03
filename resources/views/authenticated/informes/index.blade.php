@extends('authenticated.usuarios.admin')
@section('contenido')
<form action="{{ route('lista-usuarios') }}" method="POST">
    @csrf
    <input name="busq" required class="col-form-label form-control" type="text" placeholder="Buscar por cédula" />
    <input value="Buscar" type="submit" class="btn btn-secondary"/>
</form>
<div class="card">
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
                    <span class="oi oi-pencil"></span>
                    <span class="oi oi-trash"></span>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
