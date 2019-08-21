@extends('main')
@section('showtop')
<strong>{{auth()->user()->cargo}}: {{auth()->user()->name}}</strong>
@endsection
@section('contenido')
<div class="card col-md-8 row justify-content-center">
    <form action="{{ route('crear-dex') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right" for="declaracion_de_cambio">Declaración de Cambio</label>
            <div class="col-md-6">
                <input id="declaracion_de_cambio" type="number" class="form-control @error('declaracion_de_cambio') is-invalid @enderror" name="declaracion_de_cambio" required autocomplete="declaracion_de_cambio" autofocus>
                @error('declaracion_de_cambio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right"  for="fecha_dex">Fecha DEX</label>
            <div class="col-md-6">
                <input id="fecha_dex" type="date" class="form-control @error('fecha_dex') is-invalid @enderror" name="fecha_dex" required autocomplete="fecha_dex" autofocus>
                @error('fecha_dex')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right"  for="vr_declaracion">Valor Declaración</label>
            <div class="col-md-6">
                <input id="vr_declaracion" type="number" class="form-control @error('vr_declaracion') is-invalid @enderror" name="vr_declaracion" required autocomplete="vr_declaracion" autofocus>
                @error('vr_declaracion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right" for="fecha_presentacion">Fecha Presentación</label>
            <div class="col-md-6">
                <input id="fecha_presentacion" type="date" class="form-control @error('fecha_presentacion') is-invalid @enderror" name="fecha_presentacion" required autocomplete="fecha_presentacion" autofocus>
                @error('fecha_presentacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right" for="numero_dex">Numero DEX</label>
            <div class="col-md-6">
                <input id="numero_dex" type="number" class="form-control @error('numero_dex') is-invalid @enderror" name="numero_dex" required autocomplete="numero_dex" autofocus>
                @error('numero_dex')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right"  for="fecha_aceptacion">Fecha Aceptación</label>
            <div class="col-md-6">
                <input id="fecha_aceptacion" type="date" class="form-control @error('fecha_aceptacion') is-invalid @enderror" name="fecha_aceptacion" required autocomplete="fecha_aceptacion" autofocus>
                @error('fecha_aceptacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right"  for="ciudad">Ciudad</label>
            <div class="col-md-6">
                <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" required autocomplete="ciudad" autofocus>
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right"  for="valor">Valor</label>
            <div class="col-md-6">
                <input id="valor" type="number" class="form-control @error('valor') is-invalid @enderror" name="valor" required autocomplete="valor" autofocus>
                @error('valor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right"  for="manifiesto">Manifiesto</label>
            <div class="col-md-6">
                <input id="manifiesto" type="text" class="form-control @error('manifiesto') is-invalid @enderror" name="manifiesto" required autocomplete="manifiesto" autofocus>
                @error('manifiesto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right" for="numero_factura">Valor</label>
            <div class="col-md-6">
                <input id="numero_factura" type="number" class="form-control @error('numero_factura') is-invalid @enderror" name="numero_factura" required autocomplete="numero_factura" autofocus>
                @error('numero_factura')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right" for="valor_factura">Valor Factura</label>
            <div class="col-md-6">
                <input id="valor_factura" type="number" class="form-control @error('valor_factura') is-invalid @enderror" name="valor_factura" required autocomplete="valor_factura" autofocus>
                @error('valor_factura')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right" for="cliente">Cliente</label>
            <div class="col-md-6">
                <input id="cliente" type="text" class="form-control @error('cliente') is-invalid @enderror" name="cliente" required autocomplete="cliente" autofocus>
                @error('cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label  class="col-md-5 col-form-label text-md-right" for="fecha_embarque">Fecha Embarque</label>
            <div class="col-md-6">
                <input id="fecha_embarque" type="date" class="form-control @error('fecha_embarque') is-invalid @enderror" name="fecha_embarque" required autocomplete="fecha_embarque" autofocus>
                @error('fecha_embarque')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 col-form-label text-md-right"  for="agencia">Agencia</label>
            <div class="col-md-6">
                <input id="agencia" type="text" class="form-control @error('agencia') is-invalid @enderror" name="agencia" required autocomplete="agencia" autofocus>
                @error('agencia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Crear">
    </form>
</div>
@endsection