@extends('layouts.profile')

@section('title', ' - Purchased History')

@section('info')
    <section id="history">
        @foreach($orders as $order)
            @include('partials.profile.historyItem', ['order' => $order])
        @endforeach
    </section>
@endsection