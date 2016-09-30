
@extends('layouts.app')

@section('content')
<section class="section section-commerce">
    <div class="container element-top-50 element-bottom-50">

        <div class="row" ng-if="cart.products.length">
            <h1>Comprar</h1>
            <div class="row border-bottom">
                <div class="col-sm-3"><strong>Foto</strong></div>
                <div class="col-sm-2"><strong>Producto</strong></div>
                <div class="col-sm-3"><strong>Descripcion</strong></div>
                <div class="col-sm-2"><strong>Cantidad</strong></div>
                <div class="col-md-2"><strong>Subtotal</strong></div>
            </div>
            <div class="row border-bottom"  ng-repeat="product in cart.products track by $index">
                <div class="col-sm-3">
                    <img src="<% product.img %>" width="90" height="114" ng-if="product.img">
                    <img src="http://directory.africa-business.com/assets/media/noimage.png" width="90" height="114" ng-if="!product.img">
                </div>
                <div class="col-sm-2"><% product.name %></div>
                <div class="col-sm-3"><% product.description| removeHTMLTags | limitTo: 80 %>...</div>
                <div class="col-sm-2"><% product.units %></div>
                <div class="col-sm-2">$<% product.price * product.units | number %></div>
            </div>
            <h2>Total: $<% calcTotal() | number%></h2>
            <h3 ng-if="!isAuthenticated" class="auth-error-checkout">
                <i style="color: red" class="fa fa-bell"></i>
                Debes <a href="javascript:;" ng-click="openAuthModal()">iniciar sesión</a> para continuar.
            </h3>
            <button class="btn btn-success pull-right" ng-click="checkout()" ng-disabled="!isAuthenticated">Confirmar pedido</button>
        </div>
    </div>
</section>

@endsection
