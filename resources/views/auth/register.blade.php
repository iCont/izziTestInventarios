@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center"><span class="span_inicio">Registro de Usuario</span></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{-- contenido --}}
                            @csrf
                            <div class="row registro-form-container">
                                <div class="col-12">
                                    <label for="name" class="label-izzi col-form-label text-md-start">Nombre</label>
                                    <input id="name" type="text" class="fields form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="apellido_paterno" class="label-izzi col-form-label text-md-start">Apellido Paterno</label>
                                    <input id="apellido_paterno" type="text" class="fields form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autocomplete="Apellido Paterno" autofocus>
                                    @error('apellido_paterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="apellido_materno" class="label-izzi col-form-label text-md-start">Apellido Materno</label>
                                    <input id="apellido_materno" type="text" class="fields form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno" value="{{ old('apellido_materno') }}" required autocomplete="Apellido Materno" autofocus>
                                    @error('apellido_materno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="email" class="label-izzi col-form-label text-md-start">{{ __('Correo Electrónico') }}</label>
                                    <input id="email" type="email" class="fields form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password" class="label-izzi col-form-label text-md-start">{{ __('Contraseña') }}</label>
                                    <input id="password" type="password" class="fields form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password-confirm" class="label-izzi col-form-label text-md-start">{{ __('Confirmar Contraseña') }}</label>
                                    <input id="password-confirm" type="password" class="fields form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-izzi-int">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- contenido --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
