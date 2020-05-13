<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Review on {{$review->item->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Review Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$review->title}}" placeholder="Write question here...">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Review</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">{{$review->body}}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                <button type="button" class="btn button">Save changes</button>
            </div>
        </div>
    </div>
</div>