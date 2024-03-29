@extends('layouts.app')
@section('title')
    Iniciar Sesión | FlorDEX
@endsection
@section('content')
            <div id="lmain">
                <br>
                <div class="card">
                    <div class="card-header"><h1>Inicio de Sesión</h1></div>
                    <br>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div>
                                    <label for="cedula" >Cédula</label>
                                    <div>
                                        <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autofocus>
                                            @error('cedula')
                                                <br>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="password">{{ __('Password') }}</label>
                                        <div >
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div >
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" id="forgt" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <br>
                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                            <br>
                                            <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

