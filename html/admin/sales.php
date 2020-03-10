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

        <div class="mb-4 border-bottom mt-2">
          <h1>Sales</h1>
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
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/add_sale.php'">
              Add Sale
            </button>
          </div>
        </div>

        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Start Date</th>
              <th scope="col">End Date</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="align-middle" scope="row">4</th>
              <td class="align-middle">Inktober Fest</td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">Sunday, 15-Mar-20 12:34:17</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_sale.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">3</th>
              <td class="align-middle">Inktober Fest</td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">Sunday, 15-Mar-20 12:34:17</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_sale.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">2</th>
              <td class="align-middle">Inktober Fest</td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">Sunday, 15-Mar-20 12:34:17</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_sale.php'">Edit</button>
                <button type="button" class="btn btn-danger mx-2">Remove</button>
              </td>
            </tr>
            <tr>
              <th class="align-middle" scope="row">1</th>
              <td class="align-middle">Inktober Fest</td>
              <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
              <td class="align-middle">Sunday, 15-Mar-20 12:34:17</td>
              <td class="align-middle">
                <button type="button" class="btn btn-secondary mx-2" onclick="location.href='/admin/add_sale.php'">Edit</button>
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