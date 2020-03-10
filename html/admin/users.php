<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("users") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Users</h1>
        </div>

        <div class="input-group my-3 mr-sm-2">
          <input class="form-control" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Filter
            </button>
            <div class="dropdown-menu p-4">
              <strong>IMPLEMENT FILTERING</strong>
            </div>
          </div>
        </div>

        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Date Of Birth</th>
              <th scope="col">Billing</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="align-middle" scope="row">3</th>
              <td class="align-middle">Miguel</td>
              <td class="align-middle">Ferreira</td>
              <td class="align-middle">miguel.ferreira@mail.com</td>
              <td class="align-middle">+351 987876453</td>
              <td class="align-middle">25-04-1974</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewUser3">
                  View Billing
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewUser3" tabindex="-1" role="dialog" aria-labelledby="viewUser3Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewUser3Modal">Billing Information</h5>
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
                              <td class="align-middle">MasterCard XXXX-XXXX-XXXX-XXXX</td>
                              <td class="align-middle">Address Street, 123 - 6ª esq frente</td>
                              <td class="align-middle">Avenida Sérgio Sobral Nunes, 123 - 6ª esq frente</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <button type="button" class="btn btn-danger">
                  Delete
                </button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">2</th>
              <td class="align-middle">João</td>
              <td class="align-middle">Massa</td>
              <td class="align-middle">joao.massinhas@sigala.com</td>
              <td class="align-middle">+351 987 876 453</td>
              <td class="align-middle">25-04-1974</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewUser2">
                  View Billing
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewUser2" tabindex="-1" role="dialog" aria-labelledby="viewUser2Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewUser2Modal">Billing Information</h5>
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
                              <td class="align-middle">MasterCard XXXX-XXXX-XXXX-XXXX</td>
                              <td class="align-middle">Address Banana, 123 - 6ª esq frente</td>
                              <td class="align-middle">Avenida Sérgio Sobral Nunes, 123 - 6ª esq frente</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <button type="button" class="btn btn-danger">
                  Delete
                </button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">1</th>
              <td class="align-middle">Corona</td>
              <td class="align-middle">Virus</td>
              <td class="align-middle">covid-19@dgs.pt</td>
              <td class="align-middle">+351 987 876 453</td>
              <td class="align-middle">25-04-2019</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewUser1">
                  View Billing
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewUser1" tabindex="-1" role="dialog" aria-labelledby="viewUser1Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewUser1Modal">Billing Information</h5>
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
                              <td class="align-middle">MasterCard XXXX-XXXX-XXXX-XXXX</td>
                              <td class="align-middle">FEUP, Address Queijo, 127 - 6ª esq frente</td>
                              <td class="align-middle">Avenida Sérgio Sobral Nunes, 123 - 6ª esq frente</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <button type="button" class="btn btn-danger">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
    </main>

  </div>
</div>

<?php
  draw_footer();
?>
