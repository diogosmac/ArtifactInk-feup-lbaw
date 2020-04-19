<tr>
  <th class="align-middle" scope="row">{{ $user->id }}</th>
  <td class="align-middle">{{ $user->firstName }}</td>
  <td class="align-middle">{{ $user->lastName }}</td>
  <td class="align-middle">{{ $user->email }}</td>
  <td class="align-middle">{{ $user->phone }}</td>
  <td class="align-middle">{{ $user->birthday }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewUser{{ $user->id }}">
      View Billing
    </button>
    <!-- Modal -->
    <div class="modal fade" id="viewUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="viewUser{{ $user->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewUser{{ $user->id }}Modal">Billing Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">Credit Card</th>
                  <th scope="col">Address 1</th>
                  <th scope="col">Address 2</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle">{{ $user->card }}</td>
                  <td class="align-middle">{{ $user->address1 }}</td>
                  <td class="align-middle">{{ $user->address2 }}</td>
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
  <td class="align-middle">
    <button type="button" class="btn btn-link a_link">
      Delete
    </button>
  </td>
</tr>