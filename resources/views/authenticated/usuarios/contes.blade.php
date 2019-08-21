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
    <script>
            function Ver(id) {
                alert(id);
            }
    </script>
@endsection
