@extends('layouts.common')

@section('content')
<section class="mx-auto my-3">
    <article class="bg-light p-4">
        <h1 class="px-2">FAQ</h1>
        <div class="accordion mt-4" id="faqs">
            @include('partials.info.faqQuestion')
        </div>
    </article>
</section>
@endsection
