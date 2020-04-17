@extends('layouts.profile')

@section('info')

          <section id="wishlist">
          <ul class="list-group">
            @include('partials.productWishlist')
            @include('partials.productWishlist')
            @include('partials.productWishlist')
          </ul>
          </section>

@endsection