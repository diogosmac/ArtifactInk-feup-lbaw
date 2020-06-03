<tr>
  <th class="align-middle" scope="row">{{ $subcategory->id }}</th>
  <td class="align-middle">{{ $subcategory->name }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editSubcategory{{ $subcategory->id }}">
      Edit
    </button>

    <!-- Modal -->
    <div class="text-left modal fade" id="editSubcategory{{ $subcategory->id }}" tabindex="-1" role="dialog" aria-labelledby="subcategory{{ $subcategory->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="subcategory{{ $subcategory->id }}Modal">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.categories') }}" method="POST" id="edit-subcategory-{{ $subcategory->id }}">
              @csrf
              @method('PUT')
              <input required name="id" type="hidden" class="form-control" value="{{ $subcategory->id }}">
              <div class="form-group">
                <label for="subcategoryName">Name</label>
                <input required name="name" type="text" class="form-control" id="subcategoryName" value="{{ $subcategory->name }}">
              </div>
              <div class="form-group">
                <label for="subcategoryCategory">Parent Category</label>
                <select required name="id_parent" class="custom-select" id="subcategoryCategory">
                  @foreach($parent_categories as $parent_category)
                    <option {{ ($parent_category->id == $subcategory->id_parent) ? 'selected' : '' }} value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>
                  @endforeach
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
            <button type="submit" form="edit-subcategory-{{ $subcategory->id }}" class="btn button">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <button type="submit" form="delete-subcategory-{{ $subcategory->id }}" class="btn btn-link a_link">Delete</button>
    <form action="{{ route('admin.categories') }}" method="POST" id="delete-subcategory-{{ $subcategory->id }}">
      @csrf
      @method('DELETE')
      <input type="hidden" name="id" value="{{ $subcategory->id }}">
    </form>
  </td>
</tr>