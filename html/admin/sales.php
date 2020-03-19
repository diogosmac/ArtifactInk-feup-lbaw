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
            <button type="button" class="btn button" onclick="location.href='/admin/add_sale.php'">
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
            <?php
            $sales = array(
              // sale 4
              array(
                "id" => 4,
                "name" => "Inktober Fest",
                "startTimestamp" => "Sunday, 08-Mar-20 12:34:17",
                "endTimestamp" => "Sunday, 15-Mar-20 12:34:17"
              ),
              // sale 3
              array(
                "id" => 3,
                "name" => "Inktober Fest",
                "startTimestamp" => "Sunday, 08-Mar-20 12:34:17",
                "endTimestamp" => "Sunday, 15-Mar-20 12:34:17"
              ),
              // sale 2
              array(
                "id" => 2,
                "name" => "Inktober Fest",
                "startTimestamp" => "Sunday, 08-Mar-20 12:34:17",
                "endTimestamp" => "Sunday, 15-Mar-20 12:34:17"
              ),
              // sale 1
              array(
                "id" => 1,
                "name" => "Inktober Fest",
                "startTimestamp" => "Sunday, 08-Mar-20 12:34:17",
                "endTimestamp" => "Sunday, 15-Mar-20 12:34:17"
              )
            );

            foreach ($sales as $sale) {
              draw_sale_row($sale);
            }
            ?>
          </tbody>
        </table>

      </div>
    </main>

  </div>
</div>

<?php
draw_footer();
?>