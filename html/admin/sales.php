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
            <input class="form-control" placeholder="Search Sale" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                Filter
              </button>
            </div>
          </div>
          <div class="flex-shrink-0">
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/add_sale.php'">
              Add Sale
            </button>
          </div>
        </div>

        <div class="collapse" id="collapseFilter">
          <div class="row align-items-center justify-content-around">
            <div class="form-row col-12">
              <!-- Sale ID -->
              <div class="form-group col-md-2">
                <label for="inputUserID">Sale ID</label>
                <input type="number" min=1 class="form-control" id="inputUserID">
              </div>
              <!-- Min Date -->
              <div class="form-group col-md-5">
                <label for="inputMinDate">Minimum Date</label>
                <input type="date" class="form-control" id="inputMinDate">
              </div>
              <!-- Max Date -->
              <div class="form-group col-md-5">
                <label for="inputMaxDate">Maximum Date</label>
                <input type="date" class="form-control" id="inputMaxDate">
              </div>
            </div>
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