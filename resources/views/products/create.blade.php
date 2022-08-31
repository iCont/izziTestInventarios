@extends('layouts.template')
@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center"><span class="span_inicio">Registro de Productos</span></div>
                    <div class="container errors_container mt-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    -{{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form method="POST" action="{{ route('products.store') }}">
                                {{-- contenido --}}
                                @csrf
                                <div class="row registro-form-container">
                                    <div class="col-12">
                                        <label for="name" class="label-izzi col-form-label text-md-start">Nombre de
                                            producto</label>
                                        <input id="name" type="text"
                                            class="fields form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" autofocus>
                                    </div>
                                    <div class="col-12">
                                        <label for="price" class="label-izzi col-form-label text-md-start">Precio</label>
                                        <input id="price" type="text"
                                            class="fields form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ old('price') }}" autocomplete="Precio" autofocus>
                                    </div>
                                    <div class="col-12">
                                        <label for="category"
                                            class="label-izzi col-form-label text-md-start">{{ __('Categorias') }}</label>
                                        <select name="category" id="" class="form-control fields">
                                            <option value="">Selecciona una categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{old('category')==$category->id ? "selected" : ""}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="branch"
                                            class="label-izzi col-form-label text-md-start">{{ __('Sucursal') }}</label>
                                        <select name="branch" id="" class="form-control fields">
                                            <option value="">Selecciona una Sucursal</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}" {{old('branch')==$branch->id ? "selected" : ""}}>{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="description"
                                            class="label-izzi col-form-label text-md-start">Descripción</label>
                                        <textarea name="description" class="fields form-control" id="" cols="30" rows="20">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-izzi-int">
                                            {{ __('Registrar') }}
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
    @if (Session::has('updated_status'))
    <script>
        console.log('ENTREEEE');
        Swal.fire(
            'Listo!',
            'Registro actualizado',
            'success'
        )
    </script>
@else
@endif
@endsection
