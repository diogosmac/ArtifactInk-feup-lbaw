<div class="d-flex justify-content-between align-items-start flex-wrap">
  <h3>{{ $question->question }}</h3>
  <div>
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editQuestion{{ $question->id }}Modal">
      Edit
    </button>
    <div class="modal fade" id="editQuestion{{ $question->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="question{{ $question->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="question{{ $question->id }}Modal">Edit Frequently Asked Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="question{{ $question->id }}Title">Question</label>
                <input type="text" class="form-control" id="question<{{ $question->id }}Title" value="{{ $question->question }}" placeholder="Write question here...">
              </div>
              <div class="form-group">
                <label for="question<{{ $question->id }}Answer">Answer</label>
                <textarea class="form-control" id="{{ $question->id }}Answer" rows="5" placeholder="Write answer here...">{{ $question->answer }}</textarea>
              </div>
              <div class="form-group">
                <label for="question1Number">Question number:</label>
                <select class="form-control" id="question1Number">
                  @php
                    $faq_count = 4;
                  @endphp
                  @for ($i = 1; $i < $faq_count; $i++)
                    <option {{ ($question->number == $i) ? 'selected' : '' }}>{{ $i }}</option>
                  @endfor
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
            <button type="button" class="btn button">Edit Question</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="text-justify">
  <p>
    {{ $question->answer }}
  </p>
</div>