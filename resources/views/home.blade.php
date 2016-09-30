@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="divider-wrapper">
                    <div class="visible-xs element-height-30"></div>
                    <div class="visible-sm element-height-30"></div>
                    <div class="visible-md element-height-30"></div>
                    <div class="visible-lg element-height-30"></div>
                </div>
                <div class="woocommerce columns-6">
                    <div class="row">
                        @if (session('msg'))
                        <div class="alert alert-danger">
                                {{ session('msg') }}
                        </div>
                        @endif
                        <ul class="products">
                            @foreach($products as $product)
                            <li class="product col-md-2"> <a href="/producto/{{ $product->slug }}">

                                    <div class="product-image">
                                        <div class="product-image-front">
                                            @if($product->img)
                                            <img src="{{ $product->img }}" width="500" height="700">
                                            @else
                                            <img src="http://directory.africa-business.com/assets/media/noimage.png" width="500" height="700">
                                            @endif
                                        </div>

                                        <div class="product-image-overlay">
                                            <h4>Ver detalle</h4>
                                        </div>
                                     </div>
                                </a>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="/producto/{{ $product->slug }}">{{ $product->name }}</a>
                                    </h3> <span class="product-categories">
                                        {{ str_limit(strip_tags($product->description), 80) }}
                                    </span>
                                    <h3 class="price">
                                        <ins>
                                            <span class="amount">&#36;{{ number_format($product->price, 0, '.', '.') }}
                                            </span>
                                        </ins>
                                    </h3>
                                    <a class="add-to-cart-button" href="javascript:;" title="Agregar al carrito" ng-click="addProduct({{ $product->id }})">
                                        <i class="icon-bag"></i>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

