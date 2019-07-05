@extends('authenticated.usuarios.admin')
@section('contenido')
    @includeIf('repository.alerts')
    <div id="editar" class="justify-content-center">
        <div class="col-md-auto justify-content-center">

            <div class="card">
                <strong class="card-header">Esta editando el informe {{$tipo_informe->nombre}}</strong>
                <div class="card-body">
                    <form method="POST" action="{{ route('tipo_informe_update',['$id'=> $tipo_informe->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-5 col-form-label text-md-right">Nombre de informe</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') ? old('nombre') : $tipo_informe->nombre}}" required autocomplete="nombre" autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Atributos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos_dex as $dato)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="{{$dato->id}}" name="{{$dato->nombre}}" {{old($dato->nombre) ? 'checked' : ($tipo_informe->datos_dex()->wherePivot('dato_dex_id',$dato->id)->first() ? 'checked' : '' )}} >
                                            <label class="custom-control-label" for="{{$dato->id}}" >
                                                {{$dato->nombre}}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
