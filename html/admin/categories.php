<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("categories") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Categories</h1>
        </div>

        <div class="mx-auto mt-2">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap mt-2">
                <h3>Category</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
                  Add Category
                </button>
                <!-- Modal -->
                <div class="text-left modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="question0Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="question0Modal">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="categoryName">Name</label>
                            <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Category</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="input-group my-3 mr-sm-2">
                <input class="form-control" placeholder="Search" aria-label="Search">
              </div>
              <table class="table table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="align-middle" scope="row">3</th>
                    <td class="align-middle">Ink</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editCategory3">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editCategory3" tabindex="-1" role="dialog" aria-labelledby="category3Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="category3Modal">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">2</th>
                    <td class="align-middle">Machines</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editCategory2">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editCategory2" tabindex="-1" role="dialog" aria-labelledby="category2Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="category2Modal">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div> <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">1</th>
                    <td class="align-middle">Designs</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editCategory1">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editCategory1" tabindex="-1" role="dialog" aria-labelledby="category1Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="category1Modal">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div> <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap mt-2">
                <h3>Subcategory</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubcategory">
                  Add Subcategory
                </button>
                <!-- Modal -->
                <div class="text-left modal fade" id="addSubcategory" tabindex="-1" role="dialog" aria-labelledby="subcategoryModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="subcategoryModal">Add Subcategory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="subcategoryName">Name</label>
                            <input type="text" class="form-control" id="subcategoryName" placeholder="Write name here...">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Subcategory</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-group my-3 mr-sm-2">
                <input class="form-control" placeholder="Search" aria-label="Search">
              </div>
              <table class="table table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="align-middle" scope="row">4</th>
                    <td class="align-middle">Black</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editSubcategory4">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editSubcategory4" tabindex="-1" role="dialog" aria-labelledby="subcategory4Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="subcategory4Modal">Edit Subcategory</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">3</th>
                    <td class="align-middle">MakePaint Machines</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editSubcategory3">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editSubcategory3" tabindex="-1" role="dialog" aria-labelledby="subcategory3Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="subcategory3Modal">Edit Subcategory</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">2</th>
                    <td class="align-middle">Dotwork</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editSubcategory2">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editSubcategory2" tabindex="-1" role="dialog" aria-labelledby="subcategory2Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="subcategory2Modal">Edit Subcategory</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">1</th>
                    <td class="align-middle">Realism</td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-secondary mx-2" data-toggle="modal" data-target="#editSubcategory1">
                        Edit
                      </button>
                      <!-- Modal -->
                      <div class="text-left modal fade" id="editSubcategory1" tabindex="-1" role="dialog" aria-labelledby="subcategory1Modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="subcategory1Modal">Edit Subcategory</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="categoryName">Name</label>
                                  <input type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-danger mx-2">Remove</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </main>

  </div>
</div>

<?php
  draw_footer();
?>