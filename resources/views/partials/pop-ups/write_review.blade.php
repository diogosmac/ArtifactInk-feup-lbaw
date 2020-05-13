<!--<div id="reviewPopup" class="d-flex flex-column border rounded border-secondary bg-light mx-auto">
	<div class="px-2">
		<button type="button" class="close" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="d-flex flex-column align-items-center justify-content-around px-4 pb-3">
		<h4>Black Ink</h4>
		<div class="d-flex flex-row justify-content-start mt-2 w-100">
			<h5>Rating</h5>
			<div class="d-flex flex-row px-3">
				<i class="material-icons" style="color: gold;">star_outline</i>
				<i class="material-icons" style="color: gold;">star_outline</i>
				<i class="material-icons" style="color: gold;">star_outline</i>
				<i class="material-icons" style="color: gold;">star_outline</i>
				<i class="material-icons" style="color: gold;">star_outline</i>
			</div>
		</div>
		<input class="form-control m-1" type="text" placeholder="Subject">
		<textarea class="form-control m-1" rows="6" placeholder="Tell us what you think"></textarea>
		
	</div>
</div>
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Review on {{$item->name}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="rating_fieldset">Rating</label>
						<fieldset id="rating_fieldset" class="rating">
    						<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5"><i class="fas fa-star"></i></label>
    						<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4"><i class="fas fa-star"></i></label>
    						<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3"><i class="fas fa-star"></i></label>
    						<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2"><i class="fas fa-star"></i></label>
    						<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1"><i class="fas fa-star"></i></label>
						</fieldset>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Review Title</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write question here...">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Review</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tell us what you think..."></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary button mt-2">Submit</button>
			</div>
		</div>
	</div>
</div>