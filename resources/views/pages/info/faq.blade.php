@extends('layouts.common')

@section('title', ' - FAQs')

@section('content')
  <section class="mx-auto my-3">
    <article class="bg-light p-4">
      <h1 class="px-2">FAQ</h1>
      <div class="accordion mt-4" id="faqs">
        @each('partials.info.faqQuestion', $faqs, 'faq')
      </div>
    </article>
  </section>
@endsection