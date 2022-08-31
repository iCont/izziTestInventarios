@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h2><span class="span_inicio">Listado de productos</span></h2>
            </div>
            <div class="text-center">
                <a href="{{ route('products.create') }}" class="btn btn-izzi-product shadow"><span
                        class="btn_reg">Registrar</span></a>
            </div>
            <div class="col-12 table_container mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Sucursal</th>
                            <th class="width_table text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->branch->name }}</td>
                                <td class="buttons_container">
                                    <a class="btn btn-icon_edit edit_product" href="{{route('products.show',$product)}}" ><i class="fas fa-edit icon_edit"></i></a>

                                    <form class="form_delete" action="{{ route('products.destroy', $product) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-icon_trash" type="submit"><i
                                                class="fas fa-trash icon_trash"></i></button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
    @if (Session::has('updated_status'))
        <script>
            Swal.fire(
                'Listo!',
                'Registro actualizado',
                'success'
            )
        </script>
    @else
    @endif
    @if (Session::has('delet_product'))
        <script>
            Swal.fire(
                'Listo!',
                'Producto eliminado',
                'success'
            )
        </script>
    @else
    @endif
@endsection
