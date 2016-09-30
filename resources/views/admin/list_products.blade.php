@extends('layouts.admin')

@section('content')
<section class="section section-commerce">
    <div class="container element-top-50 element-bottom-50">
        <div class="row">
            <a href="/admin/products/new" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Agregar</a>
            <h1>Productos</h1>
            <div class="row border-bottom">
                <div class="col-sm-3"><strong>Foto</strong></div>
                <div class="col-sm-3"><strong>Nombre</strong></div>
                <div class="col-sm-2"><strong>Precio</strong></div>
                <div class="col-md-2"><strong>Stock</strong></div>
                <div class="col-md-2"><strong>Opciones</strong></div>
            </div>
            @foreach($products as $product)
            <div class="row border-bottom">
                <div class="col-sm-3">
                    @if($product->img)
                    <img src="{{ $product->img }}" width="90" height="114">
                    @else
                    <img src="http://directory.africa-business.com/assets/media/noimage.png" width="90" height="114">
                    @endif
                </div>
                <div class="col-sm-3">{{ $product->name }}</div>
                <div class="col-sm-2">${{ number_format($product->price, 0, ',', ',')}}</div>
                <div class="col-sm-2">{{ $product->stock }}</div>
                <div class="col-sm-2">
                    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-sm btn-success">Editar</a>
                    <form action="/admin/products/{{ $product->id}}/destroy" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
