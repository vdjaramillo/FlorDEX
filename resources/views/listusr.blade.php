@extends('admin')
@section('links')
    <nav>
        <ul>
            <li id="usbtn" onclick="show()" class="list-group-item bg-soft">Usuarios</li>
            <a id="usopt" class="usopt list-group-item bg-soft" style="display:none" href="/register"><li>Registrar usuario</li></a>
            <a id="usopt" class="usopt list-group-item bg-soft activ" style="display:none" href="# "><li >Lista de usuarios</li></a>    
        </ul>
        </nav>
@endsection
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
                <td onclick="Eliminar({{$item->cedula}})"><img src="{{ asset('img/eliminar.png') }}" width="25rem" alt="Eliminar"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
            function Editar(id) {
                location.href="/editar-usuario/"+id;
            }
            function Eliminar(id){
                alert("Eliminando "+id)
            }
    </script>
@endsection