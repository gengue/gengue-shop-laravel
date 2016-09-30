@extends('layouts.admin')

@section('content')
<section class="section section-commerce">
    <div class="container element-top-50 element-bottom-50">
        <div class="row">
            @if(isset($product))
                <h1>Editar Producto</h1>
            @else
                <h1>Nuevo Producto</h1>
            @endif

            @if(isset($product))
                <form action="/admin/products/{{ $product->id}}/edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
            @else
                <form action="/admin/products/new" method="post" enctype="multipart/form-data">
            @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    @if(isset($product))
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    @else
                        <input type="text" name="name" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    @if(isset($product))
                        <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                    @else
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    @endif
                </div>
                <div class="form-group">
                    <label for="features">Features</label>
                    @if(isset($product))
                        <textarea name="features" class="form-control" rows="5">{{ $product->features }}</textarea>
                    @else
                        <textarea name="features" class="form-control" rows="5"></textarea>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    @if(isset($product))
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    @else
                        <input type="text" name="price" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    @if(isset($product))
                    <input type="text" name="stock" class="form-control" value="{{ $product->stock }}">
                    @else
                        <input type="text" name="stock" class="form-control">
                    @endif
                </div>

                <div class="form-group">
                    <label for="img">Imagen</label>
                    @if(isset($product))
                        @if($product->img)
                        <img src="{{ $product->img }}" alt="" height="120">
                        @endif
                    @else
                    @endif
                    <input  type="file" name="img" class="form-control">
                </div>
                <a href="/admin/products" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</section>
@endsection
