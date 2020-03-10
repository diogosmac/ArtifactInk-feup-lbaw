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

        <div class="mb-4 border-bottom mt-2">
          <h1>Products</h1>
        </div>

        <div class="d-flex align-items-center mb-3">
          <div class="input-group mr-sm-2">
            <input class="form-control" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
              <div class="dropdown-menu p-4">
                <strong>IMPLEMENT FILTERING</strong>
              </div>
            </div>
          </div>
          <div class="flex-shrink-0">
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/add_product.php'">
              Add Item
            </button>
          </div>
        </div>

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
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">234</th>
              <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
              <td class="align-middle">Dynamic Black Ink 100ml</td>
              <td class="align-middle">17,99€</td>
              <td class="align-middle">Ink</td>
              <td class="align-middle">Black</td>
              <td class="align-middle">34</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
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