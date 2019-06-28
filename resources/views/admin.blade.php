@extends('main')
@section('showtop')
<strong>Administrador: {{auth()->user()->name}}</strong>
@endsection
@section('navig')
<ul class="list-group">
    @section('links')
    <nav>
    <ul>
        <li id="usbtn" onclick="show()" class="list-group-item bg-soft">Usuarios</li>
        <a id="usopt" class="usopt list-group-item bg-soft" style="display:none" href="{{route('register')}}"><li>Registrar usuario</li></a>
        <a id="usopt" class="usopt list-group-item bg-soft" style="display:none" href="{{route('lista-usuarios')}}"><li >Lista de usuarios</li></a>
        <li id="usbtn" onclick="showInforme()" class="list-group-item bg-soft">Informes</li>
        <a id="usopt" class="usoptin list-group-item bg-soft" style="display:none" href="{{route('tipo_informe_create')}}"><li >Crear Tipo de Informe</li></a>
        <a id="usopt" class="usoptin list-group-item bg-soft" style="display:none" href="{{route('tipos_informes_lista')}}"><li >Lista de Informes</li></a>
    </ul>
    </nav>
    <script>
    function show(){
        if($('.usopt').css('display') == 'none'){
            $('.usopt').css({"display":"block"});
        }else{
            $('.usopt').css({"display":"none"});
        }
    }
    function showInforme(){
        if($('.usoptin').css('display') == 'none'){
            $('.usoptin').css({"display":"block"});
        }else{
            $('.usoptin').css({"display":"none"});
        }
    }
      </script>
    @show
</ul>
@endsection
