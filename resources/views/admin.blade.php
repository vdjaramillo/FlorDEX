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
        <a id="usopt" class="usopt list-group-item bg-soft" style="display:none" href="/register"><li>Registrar usuario</li></a>
        <a id="usopt" class="usopt list-group-item bg-soft" style="display:none" href="/lista-usuarios"><li >Lista de usuarios</li></a>    
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
      </script>
    @show
</ul>
@endsection