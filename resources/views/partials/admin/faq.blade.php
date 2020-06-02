<div class="d-flex justify-content-between align-items-start flex-wrap">
  <h3>{{ $faq->question }}</h3>
  <div>
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editQuestion{{ $faq->id }}Modal">
      Edit
    </button>
    <div class="modal fade" id="editQuestion{{ $faq->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="question{{ $faq->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="question{{ $faq->id }}Modal">Edit Frequently Asked Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="question{{ $faq->id }}Title">Question</label>
                <input type="text" class="form-control" id="question<{{ $faq->id }}Title" value="{{ $faq->question }}" placeholder="Write question here...">
              </div>
              <div class="form-group">
                <label for="question{{ $faq->id }}Answer">Answer</label>
                <textarea class="form-control" id="{{ $faq->id }}Answer" rows="5" placeholder="Write answer here...">{{ $faq->answer }}</textarea>
              </div>
              <div class="form-group">
                <label for="question{{ $faq->id }}Number">Question number:</label>
                <select class="form-control" id="question1Number">
                  @for ($i = 1; $i <= $count; $i++)
                    <option {{ ($faq->order == $i) ? 'selected' : '' }}>{{ $i }}</option>
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
    {{ $faq->answer }}
  </p>
</div>