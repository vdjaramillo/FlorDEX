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
                                                    <input type="checkbox" class="custom-control-input" id="{{$dato->id}}" name="{{$dato->nombre}}">
                                                    <label class="custom-control-label" for="{{$dato->id}}">
                                                        {{$dato->nombre}}
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            @foreach($datos_dex as $dato)--}}
{{--                                <div class="form-group{{ $errors->has($dato->nombre) ? ' has-error' : '' }}">--}}
{{--                                    <label for="redirect" class=" control-label" style="text-align: left">{{$dato->nombre}}</label>--}}
{{--                                    <table class="table-responsive">--}}
{{--                                        <input type="checkbox" style="float: right"--}}
{{--                                               class="custom-control-input" id="{{$dato->nombre}}">--}}
{{--                                        <label class="custom-control-label" for="{{$dato->id}}">--}}
{{--                                            {{$dato->nombre}}--}}
{{--                                        </label>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                            @endforeach--}}
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
