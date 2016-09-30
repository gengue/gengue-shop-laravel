@extends('layouts.admin')

@section('content')
<section class="section section-commerce">
    <div class="container element-top-50 element-bottom-50">
        <div class="row">
            <a href="/admin/products/new" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Agregar</a>
            <h1>Productos</h1>
            <div class="row border-bottom">
                <div class="col-sm-3"><strong>User</strong></div>
                <div class="col-sm-3"><strong>Articulos</strong></div>
                <div class="col-sm-2"><strong>Fecha</strong></div>
                <div class="col-md-2"><strong>Total</strong></div>
            </div>
            @foreach($sales as $sale)
            <div class="row border-bottom">
                <div class="col-sm-3">{{ $sale->user->name }}</div>
                <div class="col-sm-3">
                    <ul style="padding: 0;">
                        @foreach($sale->orders as $order)
                        <li>{{ $order->product->name }}({{ $order->units }})</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-2">{{ $sale->created_at }}</div>
                <div class="col-sm-2"> ${{ number_format($sale->total, 0, ',', ',')}} </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
