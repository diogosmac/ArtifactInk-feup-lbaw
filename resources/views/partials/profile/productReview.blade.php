<section id="product-review">
    <div class="row" id="review-container">
      <div class="col-md-4">
        <img src="{{ asset('storage/img_product/' . $review->item->images()->get()->first()->link) }}" alt="Ink" class="img-fluid">
      </div>
      <div class="col" id="product-review-info">

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-product-name float-left">{{$review->item->name}}</span>

          <button type="button" class="btn button-secondary float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-pen pr-2"></i>Edit
          </button>

          <!-- MODAL -->
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

        </div>

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-title">{{$review->title}}</span>
          <div>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
          </div>
        </div>

        <p class="my-1 text-justify">
          {{$review->body}}
        </p>
      </div>
    </div>
  </section>