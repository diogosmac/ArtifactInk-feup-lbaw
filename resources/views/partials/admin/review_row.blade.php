<tr>
  <th class="align-middle" scope="row">{{ $review->id }}</th>
  <td class="align-middle">{{ $review->user->name }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewReview{{ $review->id }}Item">
      View Item #{{ $review->item->id }}
    </button>
    <!-- Modal -->
    <div class="modal fade" id="viewReview{{ $review->id }}Item" tabindex="-1" role="dialog" aria-labelledby="viewItem{{ $review->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewItem{{ $review->id }}Modal">View Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Category</th>
                  <th scope="col">Subcategory</th>
                  <th scope="col">Stock</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th class="align-middle" scope="row">{{ $review->item->id }}</th>
                  <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_product/' . $review->item->images->first()->link) }}"></td>
                  <td class="align-middle">{{ $review->item->name }}</td>
                  <td class="align-middle">{{ $review->item->price }}€</td>
                  <td class="align-middle">{{ $review->item->category->name }}</td>
                  <td class="align-middle">{{ $review->item->category->parent->name }}</td>
                  <td class="align-middle">{{ $review->item->stock }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="align-middle">{{ $review->date }}</td>
  <td class="align-middle">{{ $review->score }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewReview{{ $review->id }}Content">
      View Content
    </button>
    <!-- Modal -->
    <div class="modal fade" id="viewReview{{ $review->id }}Content" tabindex="-1" role="dialog" aria-labelledby="viewContent{{ $review->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewContent{{ $review->id }}Modal">{{ $review->title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-justify">{{ $review->body }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="align-middle">
    <form action="{{ route('admin.reviews') }}" method="POST">
      @csrf
      @method('DELETE')
      <input type="hidden" name="id" value="{{ $review->id }}">
      <button type="submit" value="submit" class="btn btn-link a_link">
        Remove
      </button>
    </form>
  </td>
</tr>