@extends('main')
@section('showtop')
<strong>{{auth()->user()->cargo}}: {{auth()->user()->name}}</strong>
@endsection
@section('contenido')
<form action="{{ route('lista-usuarios') }}" method="POST">
    @csrf
    <input name="busq" required class="col-form-label form-control" type="text" placeholder="Buscar por Cliente" />
    <input value="Buscar" type="submit" class="btn btn-secondary"/>
</form>
    <table class="table">
        <thead>
            <th scope="col">Cliente</th>
            <th scope="col">Numero DEX</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ver</th>
        </thead>
        <tbody>
            @foreach ($dex as $item)
            <tr>
                <th scope="row">{{$item->cliente}}</th>
                <td>{{$item->numero_dex}}</td>
                <td>{{$item->fecha_dex}}</td>
                <td style="text-align:center"><span class="oi oi-eye" alt="eye" onclick="Ver({{$item->numero_dex}})" style="color:var(--fresh)"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form class="form-inline">
        <div class="form-group mb-2">
            <label for="informe" >Seleccionar Informe    </label>
            <select class="form-control" id="informe" name="informe" title="Seleccione una opción" required>
                <option value="" selected>Seleccione una opción</option>
                @foreach($tiposInforme as $tipoInforme)
                    <option value="{{ $tipoInforme->id }}">{{ $tipoInforme->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="staticEmail2" >Fecha Inicial:    </label>
            <input type="date" class="form-control" id="staticEmail2" value="email@example.com">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2">Fecha Final:    </label>
            <input type="date" class="form-control" id="inputPassword2" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Generar Informe</button>
    </form>
    <script>
            function Ver(id) {
                alert(id);
                location.href="../dex/ver/"+id;
            }
    </script>
@endsection
