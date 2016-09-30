@extends('layouts.admin')

@section('content')
<section class="section section-commerce">
    <div class="container element-top-50 element-bottom-50 centered">
        <h1>Productos</h1>
        <a href="/admin/products" class="btn btn-primary">Productos</a>
        <h1>Ventas</h1>
        <a href="/admin/sales" class="btn btn-primary">Ventas</a>
        <hr>
        <a href="/" class="btn"><i class="fa fa-link"></i> Ir al sitio web</a>
    </div>
</section>
@endsection
