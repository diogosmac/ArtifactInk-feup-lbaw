@extends('layouts.common')

@section('title', ' - Warranty')

@section('content')
<section class="mx-auto my-3">
    <article class="bg-light p-4">
        <h1 class="px-2">Warranty</h1>
        <div class="mt-3">
            <p>
                {{ $warranty }} 
            </p>
        </div>
        </article>
</section>
@endsection