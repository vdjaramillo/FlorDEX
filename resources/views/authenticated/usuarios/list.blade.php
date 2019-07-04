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
            <th scope="col">Cédula</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <th scope="row">{{$item->name}}</th>
                <td>{{$item->cedula}}</td>
                <td style="text-align:center" onclick="Editar({{$item->cedula}})"><img src="{{ asset('img/edit.png') }}" width="25rem" alt="Editar"></td>
                <td style="text-align:center" onclick='Eliminar({{$item->cedula}},"{{$item->name}}")'><img src="{{ asset('img/eliminar.png') }}" width="25rem" alt="Eliminar"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
            function Editar(id) {
                location.href="./editar/"+id;
            }
            function Eliminar(id,nombre){
                var bool=confirm("¿Seguro de eliminar el usuario "+nombre+"?");
                if(bool){
                    location.href="./eliminar/"+id;
                }
            }
    </script>
@endsection
