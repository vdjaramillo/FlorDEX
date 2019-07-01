@extends('authenticated.usuarios.admin')
@section('contenido')
<form action="{{ route('lista-usuarios') }}" method="POST">
    @csrf
    <input name="busq" required class="col-form-label form-control" type="text" placeholder="Buscar por cédula" />
    <input value="Buscar" type="submit" class="btn btn-secondary"/>
</form>
    <table class="table">
        <thead>
            <th scope="col">Nombre</th>
        </thead>
        <tbody>
            @foreach ($tipos_informe as $informe)
            <tr>
                <th scope="row">{{$informe->nombre}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
