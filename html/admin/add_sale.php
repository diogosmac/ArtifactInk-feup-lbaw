<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("sales") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
          <h1>Add Sale</h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
            Submit
          </button>
        </div>

        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputTitle">Title</label>
              <input type="text" class="form-control" id="inputTitle" placeholder="Write sale title...">
            </div>
            <div class="form-group col-md-3">
              <label for="inputStartDate">Start Date</label>
              <input type="date" class="form-control" id="inputStartDate">
            </div>
            <div class="form-group col-md-3">
              <label for="inputEndDate">End Date</label>
              <input type="date" class="form-control" min="0" id="inputEndDate">
            </div>
          </div>
        </form>

        <div class="mx-auto mt-2">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="mt-2">
                <h3>Add Items</h3>
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
              <table class="table table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-primary">Add</button></td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="mt-2">
                <h3>Item List</h3>
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
              <table class="table table-striped table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-danger">Remove</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-danger">Remove</button></td>
                  </tr>
                  <tr>
                    <th class="align-middle" scope="row">234</th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg"></td>
                    <td class="align-middle">Dynamic Black Ink 100ml</td>
                    <td class="align-middle">17,99€</td>
                    <td class="align-middle"><button type="button" class="btn btn-danger">Remove</button></td>
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
