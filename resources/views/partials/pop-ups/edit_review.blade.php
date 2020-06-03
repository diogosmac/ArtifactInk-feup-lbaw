<div class="modal fade" id="editReview{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Review on {{$review->item->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="editReviewForm" action="{{route('profile.reviews') }}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    {{ method_field('PUT')}}
                    <input type="hidden" name="item" value="{{$review->item->id}}">
                    <div class="form-group score_input">
                        <label for="rating_fieldset">Rating</label>
                        <div>
                            <fieldset id="rating_fieldset" class="rating_input" required>
                                <label class="star_label">
                                    <input type="radio" class="star" name="rating" value="5" @if($review->score == 5) checked="checked" @endif/>
                                    @if ($review->score < 5)
                                        <i class="far fa-star"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                </label>
                                <label class="star_label">
                                    <input type="radio" class="star" name="rating" value="4" @if($review->score == 4) checked="checked" @endif/>
                                    @if ($review->score < 4)
                                        <i class="far fa-star"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                </label>
                                <label class="star_label">
                                    <input type="radio" class="star" name="rating" value="3" @if($review->score == 3) checked="checked" @endif/>
                                    @if ($review->score < 3)
                                        <i class="far fa-star"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                </label>
                                <label class="star_label">
                                    <input type="radio" class="star" name="rating" value="2" @if($review->score == 2) checked="checked" @endif/>
                                    @if ($review->score < 2)
                                        <i class="far fa-star"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                </label>
                                <label class="star_label"> 
                                    <input type="radio" class="star" name="rating" value="1" @if($review->score == 1) checked="checked" @endif/>
                                    @if ($review->score < 1)
                                        <i class="far fa-star"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                </label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Review Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$review->title}}" placeholder="Write question here..." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Review</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="5" required>{{$review->body}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn button">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>