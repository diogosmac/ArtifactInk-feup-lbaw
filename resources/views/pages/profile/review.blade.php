@extends('layouts.profile')

@section('title', ' - Reviews')

@section('info')
  <section id="reviews">
    @include('partials.profile.productReview')
    @include('partials.profile.productReview')
    @include('partials.profile.productReview')
  </section>
@endsection
