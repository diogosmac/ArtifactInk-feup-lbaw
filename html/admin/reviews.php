<?php
include_once("../templates/tpl_admin.php");

draw_header();
draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("reviews") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Reviews</h1>
        </div>
        <div class="input-group my-3 mr-sm-2">
          <input class="form-control" placeholder="Search Client" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
              Filter
            </button>
          </div>
        </div>

        <div class="collapse" id="collapseFilter">
          <div class="row align-items-center justify-content-around">
            <div class="form-row col-12">
              <!-- Item ID -->
              <div class="form-group col-md-1">
                <label for="inputItemID">Item ID</label>
                <input type="number" min=1 class="form-control" id="inputItemID">
              </div>
              <!-- Item Name -->
              <div class="form-group col-md-5">
                <label for="inputItemName">Item Name</label>
                <input type="text" class="form-control" id="inputItemName" placeholder="Item name">
              </div>
              <!-- Min Date -->
              <div class="form-group col-md-3">
                <label for="inputMinDate">Minimum Date</label>
                <input type="date" class="form-control" id="inputMinDate">
              </div>
              <!-- Max Date -->
              <div class="form-group col-md-3">
                <label for="inputMaxDate">Maximum Date</label>
                <input type="date" class="form-control" id="inputMaxDate">
              </div>
            </div>
            <!-- Rating -->
            <div class="col-12">
              <div class="range-slider my-3">
                <label for="price">Rating:
                  <span class="rangeValues"></span>
                </label>
                <input type="range" class="custom-range price-slider" name="minRating" value="0" min="0" max="5" step="0.1">
                <input type="range" class="custom-range price-slider" name="maxRating" value="5" min="0" max="5" step="0.1">
              </div>
            </div>

          </div>

        </div>

        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User</th>
              <th scope="col">Item</th>
              <th scope="col">Order</th>
              <th scope="col">Timestamp</th>
              <th scope="col">Score</th>
              <th scope="col">Content</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $reviews = array(
              // review 3
              array(
                "id" => 3,
                "user" => "miguel102@gmail.com",
                "title" => "Good product",
                "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem dolorem, adipisci tempora esse repellendus ab reprehenderit consequatur assumenda dolorum deserunt dolore eum qui necessitatibus cupiditate nostrum aut repellat natus mollitia!",
                "score" => 4.5,
                "timestamp" => "Sunday, 08-Mar-20 12:34:17",
                "order" => 13,
                // item
                "item" => array(
                  'id' => 234,
                  'img' => "https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg",
                  'name' => "Dynamic Black Ink 100ml",
                  'price' => 17.99,
                  'category' => "Ink",
                  'subcategory' => "Black",
                  'stock' => 34
                )
              ),
              // review 2
              array(
                "id" => 2,
                "user" => "outromiguel102@gmail.com",
                "title" => "Another Good product",
                "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem dolorem, adipisci tempora esse repellendus ab reprehenderit consequatur assumenda dolorum deserunt dolore eum qui necessitatibus cupiditate nostrum aut repellat natus mollitia!",
                "score" => 4.7,
                "timestamp" => "Sunday, 08-Mar-20 12:34:17",
                "order" => 4,
                // item
                "item" => array(
                  'id' => 234,
                  'img' => "https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg",
                  'name' => "Dynamic Black Ink 100ml",
                  'price' => 17.99,
                  'category' => "Ink",
                  'subcategory' => "Black",
                  'stock' => 34
                )
              ),
              // review 1
              array(
                "id" => 1,
                "user" => "maisoutromiguel102@gmail.com",
                "title" => "Yet Another Good product",
                "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem dolorem, adipisci tempora esse repellendus ab reprehenderit consequatur assumenda dolorum deserunt dolore eum qui necessitatibus cupiditate nostrum aut repellat natus mollitia!",
                "score" => 4.9,
                "timestamp" => "Sunday, 08-Mar-20 12:34:17",
                "order" => 98,
                // item
                "item" => array(
                  'id' => 234,
                  'img' => "https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg",
                  'name' => "Dynamic Black Ink 100ml",
                  'price' => 17.99,
                  'category' => "Ink",
                  'subcategory' => "Black",
                  'stock' => 34
                )
              )
            );

            foreach ($reviews as $review) {
              draw_review_row($review);
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