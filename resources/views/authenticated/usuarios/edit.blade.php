@extends('authenticated.usuarios.admin')

@section('contenido')
<div id="actualizar">
        <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <strong class="card-header">Usuario</strong>
        <div class="card-body">
            <form action="{{ route('actualizar-usuario') }}" method="POST">
                @csrf
                <input id="id" type="number" class="form-control @error('name') is-invalid @enderror" name="id" value="{{ $user->id }}" hidden>

                <div class="form-group">
                    <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="cedula" class="col-md-5 col-form-label text-md-right">Cédula</label>

                    <div class="col-md-6">
                        <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ $user->cedula }}" required autofocus>

                        @error('cedula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email  }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }} <input type="checkbox" onchange="habilitar(this.checked)"/>
                    </label>

                    <div class="col-md-6 chkpsswd">
                        <input id="password" type="password" disabled class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" disabled type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cargo" class="col-md-5 col-form-label text-md-right">Cargo</label>

                    <div class="col-md-6">
                        <select id="cargo" name="cargo" class="form-control">
                            @foreach($roles as $rol)
                                <option value="{{$rol->name}}" {{$rol->name == $user->cargo ? 'selected' : ''}}>{{$rol->name}}</option>
                            @endforeach
                        </select>
                        @error('cargo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
<script>
function habilitar(value){
			if(value==true)
			{
				// habilitamos
				document.getElementById("password").disabled=false;
                document.getElementById("password-confirm").disabled=false;
			}else if(value==false){
				// deshabilitamos
                document.getElementById("password").disabled=true;
                document.getElementById("password-confirm").disabled=true;
			}
		}
</script>
@endsection
