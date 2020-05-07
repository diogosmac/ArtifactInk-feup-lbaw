@extends('layouts.profile')

@section('title', ' - Purchased History')

@section('info')
    <section id="history">
        @include('partials.profile.historyItem')
        @include('partials.profile.historyItem')
        @include('partials.profile.historyItem')
    </section>
@endsection