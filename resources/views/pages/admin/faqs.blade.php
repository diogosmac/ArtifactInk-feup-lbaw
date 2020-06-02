@extends('layouts.admin')

@section('title', ' Admin - FAQs')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>Frequently Asked Questions</h1>
      <button type="button" class="btn button" data-toggle="modal" data-target="#addQuestionModal">
        Add Question
      </button>
      <!-- Modal -->
      <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="question0Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="question0Modal">Add Frequently Asked Question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.faqs') }}" method="POST" id="faq-form">
                @csrf
                <div class="form-group">
                  <label for="questionTitle">Question</label>
                  <input required name='question' type="text" class="form-control" id="questionTitle" placeholder="Write question here...">
                </div>
                <div class="form-group">
                  <label for="questionAnswer">Answer</label>
                  <textarea required name='answer' class="form-control" id="questionAnswer" rows="5" placeholder="Write answer here..."></textarea>
                </div>
                <div class="form-group">
                  <label for="questionNumber">Question number:</label>
                  <select required name='order' class="form-control" id="questionNumber">
                    @foreach ($faqs as $faq)
                        <option>{{ $faq->order }}</option>
                      @if ($loop->last)
                        <option selected>{{ $faq->order + 1 }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
              <button type="submit" class="btn button" form="faq-form" value="Submit">Add Question</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mx-auto my-2">
      @foreach($faqs as $faq)
      @include('partials.admin.faq', [
        'faq' => $faq,
        'count' => count($faqs)
      ])
      @endforeach
    </div>
  </div>
</main>

{{-- Alert --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@endsection