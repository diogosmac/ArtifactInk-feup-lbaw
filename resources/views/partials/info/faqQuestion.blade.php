<div class="card">
  <div class="card-header" id="headingQuestion1">
    <h2 class="mb-0">
      <button class="btn btn-link collapsed a_link" type="button" data-toggle="collapse"
        data-target="#collapseQuestion{{ $faq->id }}" aria-expanded="false" aria-controls="collapseQuestion{{ $faq->id }}">
        {{ $faq->question }}
      </button>
    </h2>
  </div>
  <div id="collapseQuestion{{ $faq->id }}" class="collapse" aria-labelledby="headingQuestion{{ $faq->id }}" data-parent="#faqs">
    <div class="card-body">
      {{ $faq->answer }}
    </div>
  </div>
</div>