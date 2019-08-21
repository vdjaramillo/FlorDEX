@extends('authenticated.usuarios.admin')
@section('contenido')
    @includeIf('repository.alerts')
    <div id="registro" class="justify-content-center">
        <div class="col-md-auto justify-content-center">

            <div class="card">
                <strong class="card-header">Crear Tipo de Informe</strong>
                <form name="guardar" method="POST" action="{{ route('tipo_informe_store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-md-5 col-form-label text-md-right">Nombre de informe</label>

                        <div class="col-md-6">
                            <input id="nombre" type="text"
                                   class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                   value="{{ old('nombre') }}" autocomplete="nombre" autofocus>

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
                            <th>Usuarios a generar el informe</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $rol)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rol{{$rol->id}}"
                                               name="rol{{$rol->id}}" {{old('rol'.$rol->id) ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="rol{{$rol->id}}">
                                            {{$rol->name}}
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                                        <input type="checkbox" class="custom-control-input" id="{{$dato->id}}"
                                               name="{{$dato->id}}" {{old($dato->id) ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="{{$dato->id}}">
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
                            <button type="button" onclick="guardar.submit()" class="btn btn-primary">
                                Aceptar
                            </button>
                            <button type="button" onclick="cancelar()" class="btn btn-danger">
                                Cancelar
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function cancelar(){
            var bool=confirm("¿Seguro que desea cancelar?");
            if(bool){
                location.href="{{route('tipos_informes_lista')}}";
            }
        }
    </script>
@endsection
