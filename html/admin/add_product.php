<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("products") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
          <h1>Add Product</h1>
          <button type="button" class="btn btn-primary">
            Submit
          </button>
        </div>

        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputTitle">Title</label>
              <input type="text" class="form-control" id="inputTitle" placeholder="Write product title...">
            </div>
            <div class="form-group col-md-3">
              <label for="inputPrice">Price</label>
              <input type="number" step=".01" min="0" class="form-control" id="inputPrice">
            </div>
            <div class="form-group col-md-3">
              <label for="inputQuantity">Quantity</label>
              <input type="number" class="form-control" min="0" id="inputQuantity">
            </div>
          </div>
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="inputAddress">Description</label>
              <textarea class="form-control" id="titleInput" rows="4" placeholder="Write product description..."></textarea>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputCategory">Category</label>
                <select class="custom-select" id="inputCategory">
                  <option value="Ink">Ink</option>
                  <option value="Machines">Machines</option>
                  <option value="...">...</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputSubcategory">Subcategory</label>
                <select class="custom-select" id="inputCategory">
                  <option value="Ink">Ink</option>
                  <option value="Machines">Machines</option>
                  <option value="...">...</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="inputTechincal">Technical Description</label>
            <textarea class="form-control" id="inputTechincal" rows="5" placeholder="Write product technical description..."></textarea>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">

              <!-- Standar Form -->
              <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                <label for="">Upload pictures</label>
                <div class="form-inline">
                  <div class="form-group">
                    <input type="file" name="files[]" id="js-upload-files" multiple>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                </div>
              </form>

              <!-- Drop Zone -->
              <label>Or drag and drop files below</label>
              <div class="upload-drop-zone" id="drop-zone">
                Just drag and drop files here
              </div>

              <!-- Upload Finished -->
              <div class="js-upload-finished">
                <label>Processed Files</label>
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
                  <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
                </div>
              </div>
            </div>
          </div> <!-- /container -->

        </form>
      </div>
    </main>

  </div>
</div>

<?php
  draw_footer();
?>