@extends('layouts.profile')

@section('title', ' - Wishlist')

@section('info')
  <section id="wishlist">
    <ul class="list-group">
      @foreach($items as $item )
      @include('partials.profile.productWishlist', ['item'=>$item, 'picture'=>$pictures[$loop->index]])
      @endforeach
    </ul>
  </section>
@endsection
