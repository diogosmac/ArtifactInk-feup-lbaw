<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("orders") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Orders</h1>
        </div>

        <div class="input-group my-3 mr-sm-2">
          <input class="form-control" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
            <div class="dropdown-menu p-4">
              <strong>IMPLEMENT FILTERING</strong>
            </div>
          </div>
        </div>

        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User</th>
              <th scope="col">Items</th>
              <th scope="col">Timestamp</th>
              <th scope="col">Total</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="align-middle" scope="row">2</th>
              <td class="align-middle">miguel102</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewOrder2Items">
                  View Items
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewOrder2Items" tabindex="-1" role="dialog" aria-labelledby="viewItems2Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewItems2Modal">View Items</h5>
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
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th class="align-middle" scope="row">45</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                              <td class="align-middle">Dynamic Black Ink 100ml</td>
                              <td class="align-middle">9,99€</td>
                              <td class="align-middle">1</td>
                              <td class="align-middle">9,99€</td>
                            </tr>
                            <tr>
                              <th class="align-middle" scope="row">23</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://assets.bigcartel.com/product_images/247298081/559F9DEF-B438-4198-B489-23E4F737D02F.jpeg?auto=format&fit=max&w=2000"></td>
                              <td class="align-middle">MAKE PAIN Custom Tattoo Machine #28</td>
                              <td class="align-middle">90,00€</td>
                              <td class="align-middle">1</td>
                              <td class="align-middle">90,00€</td>
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
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">99.99€</td>
              <td class="align-middle">MasterCard</td>
              <td class="align-middle">
                <select class="custom-select">
                  <option value="processing">Processing</option>
                  <option selected value="shipped">Shipped</option>
                  <option value="arrived">Arrived</option>
                </select>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">1</th>
              <td class="align-middle">miguel102</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewOrder1Items">
                  View Items
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewOrder1Items" tabindex="-1" role="dialog" aria-labelledby="viewItems1Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewItems1Modal">View Items</h5>
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
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th class="align-middle" scope="row">45</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                              <td class="align-middle">Dynamic Black Ink 100ml</td>
                              <td class="align-middle">9,99€</td>
                              <td class="align-middle">3</td>
                              <td class="align-middle">29,97€</td>
                            </tr>
                            <tr>
                              <th class="align-middle" scope="row">23</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://assets.bigcartel.com/product_images/247298081/559F9DEF-B438-4198-B489-23E4F737D02F.jpeg?auto=format&fit=max&w=2000"></td>
                              <td class="align-middle">MAKE PAIN Custom Tattoo Machine #13</td>
                              <td class="align-middle">197,99€</td>
                              <td class="align-middle">1</td>
                              <td class="align-middle">197,99€</td>
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
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">199.99€</td>
              <td class="align-middle">PayPal</td>
              <td class="align-middle">
                <select class="custom-select">
                  <option value="processing">Processing</option>
                  <option value="shipped">Shipped</option>
                  <option selected value="arrived">Arrived</option>
                </select>
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
