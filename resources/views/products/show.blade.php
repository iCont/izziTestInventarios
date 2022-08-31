@extends('layouts.template')
@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center"><span class="span_inicio">Actualización de productos</span></div>
                    <div class="container errors_container_update mt-3">
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
                            <form method="POST" action="{{ route('products.update', $products) }}">
                                {{-- contenido --}}
                                {{-- {{dd($products)}} --}}
                                <div class="row registro-form-container">
                                    <div class="col-12">
                                        <label for="name" class="label-izzi col-form-label text-md-start">Nombre de
                                            producto</label>
                                        <input id="name" type="text"
                                            class="fields form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $products->name) }}" autocomplete="name" autofocus
                                            disabled>
                                    </div>
                                    <div class="col-12">
                                        <label for="price" class="label-izzi col-form-label text-md-start">Precio</label>
                                        <input id="price" type="text"
                                            class="fields form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ old('price', $products->price) }}" autocomplete="Precio" autofocus
                                            disabled>
                                    </div>
                                    <div class="col-12">
                                        <label for="category"
                                            class="label-izzi col-form-label text-md-start">{{ __('Categorias') }}</label>
                                        <select name="category" id="" class="form-control fields">
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="branch"
                                            class="label-izzi col-form-label text-md-start">{{ __('Sucursal') }}</label>
                                        <select name="branch" id="" class="form-control fields">
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="description"
                                            class="label-izzi col-form-label text-md-start">Descripción</label>
                                        <textarea name="description" class="fields form-control" id="" cols="30" rows="20" disabled>{{ old('description', $products->description) }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="status"
                                            class="label-izzi col-form-label text-md-start">{{ __('Estado') }}</label>
                                        <select name="status" id="" class="form-control fields">
                                            <option value="0" @if($products->status==0)selected @endif>Cerrado</option>
                                            <option value="1" @if($products->status==1)selected @endif>Abierto</option>

                                        </select>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label for="comment" class="label-izzi col-form-label text-md-start">Comentarios de
                                            Gestor</label>
                                        <textarea name="comment" class="fields-text form-control" id="" cols="30">{{ old('comment', $comment) }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-izzi-int">
                                            {{ __('Guardar') }}
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
