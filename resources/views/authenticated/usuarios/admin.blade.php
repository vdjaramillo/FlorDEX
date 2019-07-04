@extends('main')
@section('showtop')
<strong>Administrador: {{auth()->user()->name}}</strong>
@endsection
@section('navig')
<ul class="list-group">
   @section('links')
    <nav>
    <ul>
        <li id="usbtn" onclick="show('usopt')" class="list-group-item bg-soft">Usuarios</li>
            <a class="usopt list-group-item bg-soft" style="display:none; transition: all 1s ease 0s; width:90%" href="{{route('register')}}"><li>Registrar usuario</li></a>
            <a class="usopt list-group-item bg-soft" style="display:none; transition: all 1s ease 0s; width:90%" href="{{route('lista-usuarios')}}"><li >Lista de usuarios</li></a>
        <li id="usbtn" onclick="show('usoptin')" class="list-group-item bg-soft">Informes</li>
        <a class="usoptin list-group-item bg-soft" style="display:none; transition: all 1s ease 0s; width:90%" href="{{route('tipo_informe_create')}}"><li >Crear Tipo de Informe</li></a>
        <a class="usoptin list-group-item bg-soft" style="display:none; transition: all 1s ease 0s; width:90%" href="{{route('tipos_informes_lista')}}"><li >Lista de Informes</li></a>
    </ul>
    </nav>
    <script>
    function show(clase){
        if($('.'+clase).css('display') == 'none'){
            $('.'+clase).css({"display":"block",
                              "heigth":"auto",
                              "margin-left":"8%"});
        }else{
            $('.'+clase).css({"display":"none",
                              "transition":"all 1s ease 0s"});
        }
    }
      </script>
    @show
</ul>
@endsection
