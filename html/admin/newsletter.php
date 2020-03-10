<?php
  include_once("../templates/tpl_admin.php");

  draw_header();
  draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("newsletter") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
          <h1>Newsletter</h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
            Send Newsletter
          </button>
        </div>

        <div class="mx-auto mt-2">
          <form>
            <div class="form-group">
              <label for="subjectInput">Subject</label>
              <input type="Text" class="form-control" id="subjectInput" placeholder="Write e-mail subject...">
            </div>
            <div class="form-group">
              <label for="titleInput">Title</label>
              <input type="Text" class="form-control" id="titleInput" placeholder="Write e-mail topic...">
            </div>
            <div class="form-group">
              <label for="titleInput">Body</label>
              <textarea class="form-control" id="titleInput" rows="5" placeholder="Write e-mail body"></textarea>
            </div>

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
          </form>
        </div>
      </div>


    </main>

  </div>
</div>

<?php
  draw_footer();
?>