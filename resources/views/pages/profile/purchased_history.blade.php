@extends('layouts.profile')

@section('title', ' - Purchased History')

@section('info')
    <section id="history">
        @for ($i = 0; $i < count($orders); $i++)
            @if ($i > 0)
                <hr>
            @endif
            @include('partials.profile.historyItem', ['order' => $orders[$i]])
        @endfor
    </section>
@endsection