@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h2><span class="span_inicio">Listado de usuarios</span></h2>
            </div>
            <div class="col-12 text-center">
                @if (session('status'))
                    <div class="alert alert-success alert-width" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-12 table_container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Corrreo</th>
                            <th>Perfíl</th>
                            <th>Acceso</th>
                            <th class="width_table text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="bold_name">{{ $user->name }} {{ $user->first_surname }}
                                    {{ $user->second_surname }}</td>
                                <td>{{ $user->email }}</td>
                                <td> {{ $user->profile->name }}</td>
                                @if ($user->access == 0)
                                    <td><span class="text-danger">Desactivado</span></td>
                                @else
                                    <td><span class="text-success">Activo</span></td>
                                @endif
                                <td class="buttons_container">
                                    <button class="btn btn-icon_edit" data-bs-toggle="modal" data-bs-target="#edit_user"><i
                                            class="fas fa-edit icon_edit"></i></button>
                                    @if ($user->access == 0)
                                        <form action="{{ route('users.estado', $user) }}" method="post">
                                            @csrf
                                            <input name="access_active" type="hidden" value="{{ $user->access }}">
                                            <button class="btn btn-icon_check"><i
                                                    class="fas fa-check icon_check"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.estado', $user) }}" method="post">
                                            @csrf
                                            <input name="access_active" type="hidden" value="{{ $user->access }}">
                                            <button class="btn btn-icon_check"><i
                                                    class="fas fa-times icon_check"></i></button>
                                        </form>
                                    @endif
                                    <form class="form_delete" action="{{ route('users.destroy', $user) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-icon_trash" type="submit"><i
                                                class="fas fa-trash icon_trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="edit_userLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_userLabel"><span class="span_inicio">Editar Usuario</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form method="POST" action="{{ route('users.update',$user) }}">
                                {{-- contenido --}}
                                @csrf
                                <div class="row registro-form-container_actualizar">
                                    <div class="col-12">
                                        <label for="name" class="label-izzi col-form-label text-md-start">Nombre</label>
                                        <input id="name" type="text"
                                            class="fields form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="apellido_paterno"
                                            class="label-izzi col-form-label text-md-start">Apellido Paterno</label>
                                        <input id="apellido_paterno" type="text"
                                            class="fields form-control @error('apellido_paterno') is-invalid @enderror"
                                            name="apellido_paterno"
                                            value="{{ old('apellido_paterno', $user->first_surname) }}" required
                                            autocomplete="Apellido Paterno" autofocus>
                                        @error('apellido_paterno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="apellido_materno"
                                            class="label-izzi col-form-label text-md-start">Apellido Materno</label>
                                        <input id="apellido_materno" type="text"
                                            class="fields form-control @error('apellido_materno') is-invalid @enderror"
                                            name="apellido_materno"
                                            value="{{ old('apellido_materno', $user->second_surname) }}" required
                                            autocomplete="Apellido Materno" autofocus>
                                        @error('apellido_materno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="email"
                                            class="label-izzi col-form-label text-md-start">{{ __('Correo Electrónico') }}</label>
                                        <input id="email" type="email"
                                            class="fields form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $user->email) }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="perfil"
                                            class="label-izzi col-form-label text-md-start">{{ __('Perfil') }}</label>
                                        <select name="perfil" id="" class="form-control fields">
                                            {{-- <option value="{{$user->profile_id}}">{{$user->profile->name}}</option> --}}
                                            @foreach ($profiles as $profile)
                                                <option value="{{ old('profile_id',$profile->id )}}"  @if(old('profile') == $profile->id || $user->profile->name == $profile->name ) selected @endif>{{ $profile->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('perfil')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-izzi-int btn_edit">
                                            {{ __('Actualizar') }}
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
    </div>
    @if(Session::has('updated_status'))
    <script>
        Swal.fire(
            'Listo!',
            'Registro actualizado',
            'success'
        )
    </script>
    @else

    @endif
    @if(Session::has('deleted_user'))
    <script>
        Swal.fire(
            'Listo!',
            'Usuario eliminado',
            'success'
        )
    </script>
    @else

    @endif
@endsection
