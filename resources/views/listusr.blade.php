@extends('admin')
@section('contenido')
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
                <td onclick="Editar({{$item->cedula}})"><img src="{{ asset('img/edit.png') }}" width="25rem" alt="Editar"></td>
                <td onclick='Eliminar({{$item->cedula}},"{{$item->name}}")'><img src="{{ asset('img/eliminar.png') }}" width="25rem" alt="Eliminar"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
            function Editar(id) {
                location.href="/editar-usuario/"+id;
            }
            function Eliminar(id,nombre){
                var bool=confirm("¿Seguro de eliminar el usuario "+nombre+"?");
                if(bool){
                    alert("Eliminando "+id);
                    location.href="/eliminar-usuario/"+id;
                }
            }
    </script>
@endsection