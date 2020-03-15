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
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                Filter
              </button>
            </div>
          </div>
          <div class="flex-shrink-0">
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/add_product.php'">
              Add Item
            </button>
          </div>
        </div>

        <div class="collapse" id="collapseFilter">
          <div>
            <label class="mt-2" for="categories">Categories</label>
            <div id="categories" class="rounded border border-secondary p-2" style="max-height:10em; overflow-y: scroll">
              <?php for ($i = 1; $i < 6; $i++) { ?>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="category<?= $i ?>">
                  <label class="custom-control-label" for="category<?= $i ?>">Category <?= $i ?></label>
                </div>
              <?php } ?>
            </div>
          </div>
          <div>
            <label class="mt-3" for="brands">Brands</label>
            <div id="brands" class="rounded border border-secondary p-2" style="max-height:10em; overflow-y: scroll">
              <?php for ($i = 1; $i < 6; $i++) { ?>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="brand<?= $i ?>">
                  <label class="custom-control-label" for="brand<?= $i ?>">Brand <?= $i ?></label>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="custom-control custom-switch my-3">
            <input type="checkbox" class="custom-control-input" id="stockSwitch">
            <label class="custom-control-label" for="stockSwitch">In-Stock</label>
          </div>
          <div>
            <label for="minPrice">Minimum Price</label>
            <input type="range" class="custom-range" value="20" min="0" max="500" step="2" id="minPrice">
          </div>
          <div>
            <label for="maxPrice">Maximum Price</label>
            <input type="range" class="custom-range" value="100" min="0" max="500" step="2" id="maxPrice">
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