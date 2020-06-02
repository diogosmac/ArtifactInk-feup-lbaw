@extends('layouts.common')

@section('title', ' - About Us')

@section('content')
  <section class="mx-auto my-3">
    <article class="bg-light p-4">
      <h1 class="px-2">About Us</h1>
      <div class="mt-3">
        <p>
          {{ $about_us }}
        </p>
      </div>
    </article>
  </section>
@endsection