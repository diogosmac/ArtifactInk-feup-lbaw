@extends('layouts.common')

@section('title', $card->name)

@section('content')
  @include('partials.card', ['card' => $card])
@endsection
