@extends('layouts.profile')

@section('title', ' - Purchased History')

@section('info')
    <section id="history">
        <?php $orders = json_decode($orders[0]); ?>
        @foreach($orders as $order)
            @include('partials.profile.historyItem', ['order' => $order, 'address' => $addresses[$loop->index], 'items' => $items[$loop->index], 'pictures' => $pictures[$loop->index]])
        @endforeach
    </section>
@endsection