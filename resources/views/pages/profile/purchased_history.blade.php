@extends('layouts.profile')

@section('info')

    <section id="history">
            @include('partials.profile.historyItem')
            @include('partials.profile.historyItem')
            @include('partials.profile.historyItem')
    </section>

@endsection