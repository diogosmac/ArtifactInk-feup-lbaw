<?php
include_once("../templates/tpl_admin.php");

draw_header();
draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("reviews") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Reviews</h1>
        </div>
        <div class="input-group my-3 mr-sm-2">
          <input class="form-control" placeholder="Search Client" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
              Filter
            </button>
          </div>
        </div>

        <div class="collapse" id="collapseFilter">
          <div class="row align-items-center justify-content-around">
            <div class="form-row col-12">
              <!-- Item ID -->
              <div class="form-group col-md-1">
                <label for="inputItemID">Item ID</label>
                <input type="number" min=1 class="form-control" id="inputItemID">
              </div>
              <!-- Item Name -->
              <div class="form-group col-md-5">
                <label for="inputItemName">Item Name</label>
                <input type="text" class="form-control" id="inputItemName" placeholder="Item name">
              </div>
              <!-- Min Date -->
              <div class="form-group col-md-3">
                <label for="inputMinDate">Minimum Date</label>
                <input type="date" class="form-control" id="inputMinDate">
              </div>
              <!-- Max Date -->
              <div class="form-group col-md-3">
                <label for="inputMaxDate">Maximum Date</label>
                <input type="date" class="form-control" id="inputMaxDate">
              </div>
            </div>
            <!-- Rating -->
            <div class="col-12">
              <div class="range-slider my-3">
                <label for="price">Rating:
                  <span class="rangeValues"></span>
                </label>
                <input type="range" class="custom-range price-slider" name="minRating" value="0" min="0" max="5" step="0.1">
                <input type="range" class="custom-range price-slider" name="maxRating" value="5" min="0" max="5" step="0.1">
              </div>
            </div>

          </div>

        </div>

        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User</th>
              <th scope="col">Item</th>
              <th scope="col">Order</th>
              <th scope="col">Timestamp</th>
              <th scope="col">Score</th>
              <th scope="col">Content</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="align-middle" scope="row">3</th>
              <td class="align-middle">miguel102</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReview3Item">
                  View Item #32
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewReview3Item" tabindex="-1" role="dialog" aria-labelledby="viewItem3Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewItem3Modal">View Item</h5>
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
                              <th class="align-middle" scope="row">234</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                              <td class="align-middle">Dynamic Black Ink 100ml</td>
                              <td class="align-middle">17,99€</td>
                              <td class="align-middle">Ink</td>
                              <td class="align-middle">Black</td>
                              <td class="align-middle">34</td>
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
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/orders.php'">
                  View Order #13
                </button>
              </td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">4.5</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReview3Content">
                  View Content
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewReview3Content" tabindex="-1" role="dialog" aria-labelledby="viewContent3Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewContent3Modal">View Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-justify">
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem dolorem, adipisci tempora esse repellendus ab reprehenderit consequatur assumenda dolorum deserunt dolore eum qui necessitatibus cupiditate nostrum aut repellat natus mollitia!
                        </p>
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
                  Remove
                </button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">2</th>
              <td class="align-middle">miguel102</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReview2Item">
                  View Item #45
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewReview2Item" tabindex="-1" role="dialog" aria-labelledby="viewItem2Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewItem2Modal">View Content</h5>
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
                              <th class="align-middle" scope="row">234</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                              <td class="align-middle">Dynamic Black Ink 100ml</td>
                              <td class="align-middle">17,99€</td>
                              <td class="align-middle">Ink</td>
                              <td class="align-middle">Black</td>
                              <td class="align-middle">34</td>
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
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/orders.php'">
                  View Order #13
                </button>
              </td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">4.5</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReview2Content">
                  View Content
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewReview2Content" tabindex="-1" role="dialog" aria-labelledby="viewContent2Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewContent2Modal">View Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-justify">
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem dolorem, adipisci tempora esse repellendus ab reprehenderit consequatur assumenda dolorum deserunt dolore eum qui necessitatibus cupiditate nostrum aut repellat natus mollitia!
                        </p>
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
                  Remove
                </button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">1</th>
              <td class="align-middle">miguel102</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReview1Item">
                  View Item #32
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewReview1Item" tabindex="-1" role="dialog" aria-labelledby="viewItem1Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewItem1Modal">View Item</h5>
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
                              <th class="align-middle" scope="row">234</th>
                              <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                              <td class="align-middle">Dynamic Black Ink 100ml</td>
                              <td class="align-middle">17,99€</td>
                              <td class="align-middle">Ink</td>
                              <td class="align-middle">Black</td>
                              <td class="align-middle">34</td>
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
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/orders.php'">
                  View Order #13
                </button>
              </td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">4.5</td>
              <td class="align-middle">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReview1Content">
                  View Content
                </button>
                <!-- Modal -->
                <div class="modal fade" id="viewReview1Content" tabindex="-1" role="dialog" aria-labelledby="viewContent1Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="viewContent1Modal">View Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-justify">
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem dolorem, adipisci tempora esse repellendus ab reprehenderit consequatur assumenda dolorum deserunt dolore eum qui necessitatibus cupiditate nostrum aut repellat natus mollitia!
                        </p>
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
                  Remove
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