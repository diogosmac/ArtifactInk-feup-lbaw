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
                <button type="button" class="btn button" data-toggle="modal" data-target="#addCategory">
                  New Category
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
                        <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                        <button type="button" class="btn button">Submit</button>
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
                  <?php
                  $categories = array(
                    array("id" => 3, "name" => "Ink"),
                    array("id" => 2, "name" => "Machines"),
                    array("id" => 1, "name" => "Designs")
                  );

                  foreach ($categories as $category) {
                    draw_category_row($category);
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap mt-2">
                <h3>Subcategory</h3>
                <button type="button" class="btn button" data-toggle="modal" data-target="#addSubcategory">
                  New Subcategory
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
                          <div class="form-group">
                            <label for="subcategoryCategory">Parent Category</label>
                            <select class="custom-select" id="subcategoryCategory">
                              <option value="Ink">Ink</option>
                              <option value="Machines">Machines</option>
                              <option value="...">...</option>
                            </select>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                        <button type="button" class="btn button">Submit</button>
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
                  <?php
                  $categories = array(
                    array("id" => 4, "name" => "Black"),
                    array("id" => 3, "name" => "MakePain Machines"),
                    array("id" => 2, "name" => "Dotwork"),
                    array("id" => 1, "name" => "Realism")
                  );

                  foreach ($categories as $category) {
                    draw_subcategory_row($category);
                  }
                  ?>
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