@extends('layouts.app')

@section('content')
<section class="section section-commerce">
    <div class="container element-top-50 element-bottom-50">
        <ol class="breadcrumb">
            <li> <a class="home" href="/">Home</a> </li>
            <li>{{ $product->name }}</li>
        </ol>
        <div class="product">
            <div class="row product-summary">
                <div class="col-md-6">
                    <div class="product-images">
                        <ul class="slides product-gallery">
                            <li data-thumb="assets/images/shop/top1-1-90x114.jpg">
                                <figure>
                                    @if ($product->img)
                                    <img src="{{ $product->img }}" height="300">
                                    @else
                                    <img src="http://directory.africa-business.com/assets/media/noimage.png" height="300">
                                    @endif
                                </figure>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="summary entry-summary">
                        <h1 class="product-title bordered">{{ $product->name }}</h1>
                        <div>
                            <p class="price price-big">
                            <ins><span class="amount">&#36;{{ number_format($product->price, 0, '.', '.') }}</span></ins>
                            </p>
                        </div>
                        <div class="description">
                            {{ $product->description }}
                        </div>

                        <form>
                            <div class="quantity">
                                <input type="button" value="-" class="minus" ng-click="currentUnits=currentUnits-1">
                                <input class="input-text qty text" type="number"
                                                                   max={{ $product->stock }} min=1
                                                                   ng-model="currentUnits" ng-init="currentUnits=1" value=1>
                                <input type="button" value="+" class="plus"  ng-click="currentUnits=currentUnits+1">
                            </div>
                            <input name="add-to-cart" type="hidden" value="60">
                            <button class="single_add_to_cart_button button alt" type="submit"
                                                                                 ng-click="addProduct({{$product->id}}, currentUnits)">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- .summary -->
            <div class="row single-product-extras">
                <div class="col-md-12">
                    <div class="tabbable top">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"> <a data-toggle="tab" href="#tab-description">Caracteristicas</a> </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-description">
                                {{ $product->features }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
