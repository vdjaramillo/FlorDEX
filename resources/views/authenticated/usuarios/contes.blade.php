@extends('main')
@section('showtop')
<strong>{{auth()->user()->cargo}}: {{auth()->user()->name}}</strong>
@endsection
@section('contenido')
    @includeIf('repository.alerts')
@if(auth()->user()->cargo==="Tesorero")
<form action="{{ route('buscar-dex') }}" method="post">
    @else
    <form action="{{ route('buscar-dex2')}}" method="post">
    @endif
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

    <form class="form-inline" action="{{route('generar')}}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="informe" >Seleccionar Informe </label>
            <select class="form-control" id="informe" name="informe" title="Seleccione una opción" required>
                <option value="" selected>Seleccione una opción</option>
                @foreach($tiposInforme as $tipoInforme)
                    <option value="{{ $tipoInforme->id }}" {{old('informe') ? old('informe') == $tipoInforme->id ? 'selected' : '' : '' }}>{{ $tipoInforme->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="fecha_inicial" >Fecha Inicial: </label>
            <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" value="{{old('fecha_inicial') ? old('fecha_inicial')  : ''}}" required>
            @if ($errors->has('fecha_inicial'))
                <span class="help-block mx-sm-3 mb-2">
                    <strong class="bg-danger">{{ $errors->first('fecha_inicial') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="fecha_final">Fecha Final: </label>
            <input type="date" class="form-control" id="fecha_final" name="fecha_final" value="{{old('fecha_final') ? old('fecha_final')  : ''}}" required>
            @if ($errors->has('fecha_final'))
                <span class="help-block mx-sm-3 mb-2">
                    <strong class="bg-danger">{{ $errors->first('fecha_final') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mb-2">Generar Informe</button>
    </form>
    @if(auth()->user()->cargo=="Tesorero")
    <script>
        function Ver(id) {
            location.href="../dex/ver/"+id;
        }
    </script>
    @else
    <script>
        function Ver(id) {
            location.href="../dex/ver2/"+id;
        }
</script>
    @endif

@endsection
