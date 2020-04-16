@extends('layouts.commmon')

@section('title', $card->name)

@section('content')
  @include('partials.card', ['card' => $card])
@endsection
