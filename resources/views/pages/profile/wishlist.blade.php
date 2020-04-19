@extends('layouts.profile')

@section('info')

          <section id="wishlist">
          <ul class="list-group">
            @include('partials.profile.productWishlist')
            @include('partials.profile.productWishlist')
            @include('partials.profile.productWishlist')
          </ul>
          </section>

@endsection