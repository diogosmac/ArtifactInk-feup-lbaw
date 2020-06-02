@extends('layouts.common')

@section('title', ' - Returns and Replacements')

@section('content')
<section class="mx-auto my-3">
    <article class="bg-light p-4">
        <h1 class="px-2">Returns and Replacements</h1>
        <div class="mt-3">
            <p>
                {{ $returns }}
            </p>
        </div>

    </article>
</section>
@endsection