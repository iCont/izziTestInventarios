@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-login-container shadow">
                    <div class="text-center">
                        <span class="span_inicio">Iniciar Sesion</span>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- container --}}
                        <div class="container container-fields">
                            <div class="row mb-3">
                                <div class="col-12 mb-4">
                                    <label class="label-izzi" for="email">Correo Electrónico</label>
                                    <input id="email" type="email"
                                    class="fields form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="label-izzi" for="email">Contraseña</label>
                                    <input id="password" type="password"
                                        class="fields form-control @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- container --}}

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-izzi">
                                    {{ __('Iniciar Sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link link-forgot" href="{{ route('password.request') }}">
                                        {{ __('Olvidé mi contraseña') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
