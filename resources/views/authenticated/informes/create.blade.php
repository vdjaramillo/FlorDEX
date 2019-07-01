@extends('authenticated.usuarios.admin')
@section('contenido')
<div id="registro" class="justify-content-center">
    <div class="col-md-auto justify-content-center">
        
            <div class="card">
                <strong class="card-header">Crear Tipo de Informe</strong>
                <div class="card-body">
                    <form method="POST" action="{{ route('tipo_informe_store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-5 col-form-label text-md-right">Nombre de informe</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            @foreach($datos_dex as $dato)
                                <div class="form-group{{ $errors->has($dato->nombre) ? ' has-error' : '' }}">
                                    <label for="redirect" class=" control-label" style="text-align: left">{{$dato->nombre}}</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" style="float: right"
                                               class="form-control" id="{{$dato->nombre}}" name="{{$dato->nombre}}"
                                               placeholder="{{$dato->nombre}}"/>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
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
