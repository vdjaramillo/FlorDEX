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
                        <a onclick='eliminar("{{$informe->id}}","{{$informe->nombre}}")' class="oi oi-trash"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>No hay Tipos de Informe registrados en el sistema</h3>
    @endif
</div>

<script>
    function eliminar(id,nombre){
        var bool=confirm("¿Seguro de eliminar el informe "+nombre+"?");
        if(bool){
            location.href="./informes/"+id+"/eliminar";
        }
    }
</script>
@endsection
