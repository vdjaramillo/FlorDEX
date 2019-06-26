<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/login.css"/>
        <title>Iniciar Sesión | FlorDEX</title>
    </head>
     
    <body>
            <section id="background" style="position:absolute; left:0; top:0; width:100%; height:100%">
                    <?php
                    $r=rand(1,4); 
                    echo '<img class="img-fluid" style="width:100%; height:99%" src="img/c'.$r.'.webp" />';
                ?> 
            </section>   
        <div id="lmain"> 
            <br>
            <div class="card">
                <div class="card-header"><h1>{{ __('Login') }}</h1></div>
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