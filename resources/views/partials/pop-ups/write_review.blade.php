<div class="modal fade" id="writeReview{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Review on {{$item->name}}</h5>
				<button type="reset" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="writeReviewForm" action="{{ route('profile.reviews') }}" method="post" autocomplete="off">
			<div class="modal-body">
					{{csrf_field()}}
                    {{ method_field('POST')}}
					<input type="hidden" name="item" value="{{$item->id}}">
					<div class="form-group score_input">
						<label for="rating_fieldset">Rating</label>
						<div>
						<fieldset id="rating_fieldset" class="rating_input" required>
							<label class = "star_label">
								<input type="radio" class="star" name="rating" value="5" />
								<i class="far fa-star"></i>
							</label>

							<label class = "star_label">
								<input type="radio" class="star" name="rating" value="4" />
								<i class="far fa-star"></i>
							</label>
							
							<label class = "star_label">
								<input type="radio" class="star" name="rating" value="3" />
								<i class="far fa-star"></i>
							</label>
							
							<label class = "star_label">
								<input type="radio" class="star" name="rating" value="2" />
								<i class="far fa-star"></i>
							</label>

							<label class = "star_label">
								<input type="radio" class="star" name="rating" value="1" />
								<i class="far fa-star"></i>
							</label>
						</fieldset>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Review Title</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Write question here..." required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Review</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="5" placeholder="Tell us what you think..." required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" name="Reset" class="btn btn-link a_link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary button mt-2">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>