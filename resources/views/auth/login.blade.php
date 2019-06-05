<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/login.css"/>
        <title>Iniciar Sesión | FlorDEX</title>
    </head>
    <body>
        <div id="lmain"> 
            <br>
            <div class="card">
                <div class="card-header"><h1>{{ __('Login') }}</h1></div>
                <br>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
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
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" id="forgt" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>