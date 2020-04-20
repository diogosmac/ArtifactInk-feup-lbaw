@extends('layouts.common')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="shopping-cart-h">My Shopping Cart</h2>
    </div>
    <div class="checkout-box">
        <div class="row shopping-cart-div">
            <table class="table table-hover checkout-table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Products</th>
                        <th scope="col">Price un.</th>
                        <th scope="col">Quant.</th>
                        <th scope="col"></th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item )
                        @include('partials.cart.cartTableItem', ['item'=>$item, 'picture'=>$pictures[$loop->index]])
                    @endforeach
                    <tr class="total">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th> <span class="total">Total: </span> <span class="total-price"> </span></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row checkout-menu d-flex justify-content-between buttons " id="checkout-buttons-div">
            <div>
                <button class="btn button-secondary">Keep Shopping</button>
            </div>
            <div>
                <a class="btn button" href="{{ url('/checkout/shipping') }}">Checkout</a>
            </div>
        </div>
    </div>

    <!--mobile stuff-->
    <div class="mobile-checkout-box">
        <span class="total d-flex justify-content-end">Total:  <span class="total-price">  </span></span>
        <div class="row shopping-cart-div">
            @foreach($items as $item )
                @include('partials.cart.cartTableItem', ['item'=>$item, 'picture'=>$pictures[$loop->index]])
            @endforeach
        </div>
        <div class="row checkout-menu d-flex justify-content-between buttons " id="checkout-buttons-div">
            <div>
                <button class="btn button-secondary">Keep Shopping</button>
            </div>
            <div>
                <a class="btn button" href="{{ url('/checkout/shipping') }}">Checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection