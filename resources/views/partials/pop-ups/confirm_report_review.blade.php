<div class="modal fade" id="confirmReportReview{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you want to report this review?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link a_link" data-dismiss="modal">Cancel</button>
        <form action="" method="POST">
          @csrf
          @method('POST')
          <input type="hidden" name="item" value="{{$review->id_item}}">
          <button type="submit" class="btn button">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>