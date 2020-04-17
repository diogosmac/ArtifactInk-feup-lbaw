@extends('layouts.profile')

@section('info')
<div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
          <section id="wishlist">
          <ul class="list-group">
            @include('partials.productWishlist')
            @include('partials.productWishlist')
            @include('partials.productWishlist')
          </ul>
          </section>
        </div>
@endsection