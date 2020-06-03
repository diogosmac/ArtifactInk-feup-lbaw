@extends('layouts.common')

@section('title', ' - Payments and Shippment')

@section('content')
  <section class="mx-auto my-3">
    <article class="bg-light p-4">
      <h1 class="px-2">Payments and Shipment</h1>
      <div class="mt-3">
        <p>
          {{ $payments_shipment }}
        </p>
      </div>
    </article>
  </section>
@endsection
