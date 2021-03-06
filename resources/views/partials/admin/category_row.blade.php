<tr>
    <th class="align-middle" scope="row">{{ $category->id }}</th>
    <td class="align-middle">{{ $category->name }}</td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editCategory{{ $category->id }}">
        Edit
      </button>

      <!-- Modal -->
      <div class="text-left modal fade" id="editCategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="category{{ $category->id }}Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="category{{ $category->id }}Modal">Edit Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.categories') }}" method="POST" id="edit-category-{{ $category->id }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="categoryName">Name</label>
                  <input required name="name" type="text" class="form-control" id="categoryName" value="{{ $category->name }}">
                  <input required name="id" type="hidden" class="form-control" value="{{ $category->id }}">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
              <button type="submit" form="edit-category-{{ $category->id }}" class="btn button">Submit</button>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" form="delete-category-{{ $category->id }}" class="btn btn-link a_link">Delete</button>
      <form action="{{ route('admin.categories') }}" method="POST" id="delete-category-{{ $category->id }}">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $category->id }}">
      </form>
    </td>
  </tr>