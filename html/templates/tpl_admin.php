<?php

/**
 * Function to draw admin area header
 */
function draw_header()
{ ?>

  <!DOCTYPE html>
  <html lang="en-US">

  <head>
    <title>Artifact Ink Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/search.css">
    <!-- custom js -->
    <script src="../script/admin.js"></script>
    <script src="../script/search.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>

  <body>

  <?php }

/**
 * Function to draw admin area top navbar
 */
function draw_navbar()
{ ?>
    <header class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-0">
        <div class="collapse navbar-collapse my-2">

          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/admin/home.php">Artifact Ink Admin</a>

          <ul class="navbar-nav ml-auto mr-2">
            <li class="nav-item">
              <a class="nav-link" href="/admin/support_chat.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/home.php#notifications">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                  <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
              </a>
            </li>
          </ul>

        </div>
      </nav>
    </header>

  <?php }

/**
 * Function to draw admin area footer
 */
function draw_footer()
{ ?>
  </body>

  <footer class="footer">
  </footer>

  </html>
<?php }

/**
 * Function to draw admin area top navbar
 */
function draw_sidebar($currentPage)
{ ?>
  <!-- side bar with options -->
  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky d-flex flex-column">

      <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">Admin Dashboard</h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "home" ? ' active' : '' ?>" href="/admin/home.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "products" ? ' active' : '' ?>" href="/admin/products.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "categories" ? ' active' : '' ?>" href="/admin/categories.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
              <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
            </svg>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "orders" ? ' active' : '' ?>" href="/admin/orders.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
              <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
              <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
              <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg>
            Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "reviews" ? ' active' : '' ?>" href="/admin/reviews.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
              <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
            </svg>
            Reviews
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "users" ? ' active' : '' ?>" href="/admin/users.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            Users
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "sales" ? ' active' : '' ?>" href="/admin/sales.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
              <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
              <line x1="7" y1="7" x2="7.01" y2="7"></line>
            </svg>
            Sales
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "newsletter" ? ' active' : '' ?>" href="/admin/newsletter.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
              <line x1="22" y1="2" x2="11" y2="13"></line>
              <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
            Make Newsletter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "faq" ? ' active' : '' ?>" href="/admin/faq.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
              <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
            FAQ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == "info" ? ' active' : '' ?>" href="/admin/info.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" y1="16" x2="12" y2="12"></line>
              <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            Info
          </a>
        </li>
      </ul>

      <div class="mt-auto mb-3">
        <a class="nav-link" href="/admin">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
          </svg>
          Sign Out
        </a>
      </div>
    </div>
  </nav>
<?php }

/**
 * Function to draw product row
 */
function draw_product_row($product)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $product["id"] ?></th>
    <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="<?= $product['img'] ?>"></td>
    <td class="align-middle"><?= $product["name"] ?></td>
    <td class="align-middle"><?= $product["price"] ?></td>
    <td class="align-middle"><?= $product["category"] ?></td>
    <td class="align-middle"><?= $product["subcategory"] ?></td>
    <td class="align-middle"><?= $product["stock"] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary mx-2" onclick="location.href='/admin/add_product.php'">Edit</button>
      <button type="button" class="btn btn-link a_link mx-2">Archive</button>
    </td>
  </tr>
<?php }

/**
 * Function to draw category row
 */
function draw_category_row($category)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $category["id"] ?></th>
    <td class="align-middle"><?= $category["name"] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editCategory<?= $category["id"] ?>">
        Edit
      </button>

      <!-- Modal -->
      <div class="text-left modal fade" id="editCategory<?= $category["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="category<?= $category["id"] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="category<?= $category["id"] ?>Modal">Edit Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="categoryName">Name</label>
                  <input type="text" class="form-control" id="categoryName" placeholder="<?= $category["name"] ?>">
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

      <button type="button" class="btn btn-link a_link">Delete</button>
    </td>
  </tr>
<?php }

/**
 * Function to draw subcategory row
 */
function draw_subcategory_row($subcategory)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $subcategory["id"] ?></th>
    <td class="align-middle"><?= $subcategory["name"] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editSubcategory<?= $subcategory["id"] ?>">
        Edit
      </button>

      <!-- Modal -->
      <div class="text-left modal fade" id="editSubcategory<?= $subcategory["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="subcategory<?= $subcategory["id"] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="subcategory<?= $subcategory["id"] ?>Modal">Edit Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="subcategoryName">Name</label>
                  <input type="text" class="form-control" id="subcategoryName" placeholder="<?= $subcategory["name"] ?>">
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

      <button type="button" class="btn btn-link a_link">Delete</button>
    </td>
  </tr>
<?php }

/**
 * Function to draw product row
 */
function draw_order_row($order)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $order['id'] ?></th>
    <td class="align-middle"><?= $order['user'] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewOrder<?= $order['id'] ?>Items">
        View Items
      </button>
      <!-- Modal -->
      <div class="modal fade" id="viewOrder<?= $order['id'] ?>Items" tabindex="-1" role="dialog" aria-labelledby="viewItems<?= $order['id'] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewItems<?= $order['id'] ?>Modal">View Items</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order['items'] as $item) { ?>
                    <tr>
                      <th class="align-middle" scope="row"><?= $item['id'] ?></th>
                      <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="<?= $item['img'] ?>"></td>
                      <td class="align-middle"><?= $item['name'] ?></td>
                      <td class="align-middle"><?= $item['price'] ?>€</td>
                      <td class="align-middle"><?= $item['quantity'] ?></td>
                      <td class="align-middle"><?= $item['totalPrice'] ?>€</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td class="align-middle"><?= $order['timestamp'] ?></td>
    <td class="align-middle"><?= $order['total'] ?>€</td>
    <td class="align-middle"><?= $order['paymentMethod'] ?></td>
    <td class="align-middle">
      <select class="custom-select">
        <option value="processing">Processing</option>
        <option selected value="shipped">Shipped</option>
        <option value="arrived">Arrived</option>
      </select>
    </td>
  </tr>
<?php }

/**
 * Function to draw review row
 */
function draw_review_row($review)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $review['id'] ?></th>
    <td class="align-middle"><?= $review['user'] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewReview<?= $review['id'] ?>Item">
        View Item #<?= $review['item']['id'] ?>
      </button>
      <!-- Modal -->
      <div class="modal fade" id="viewReview<?= $review['id'] ?>Item" tabindex="-1" role="dialog" aria-labelledby="viewItem<?= $review['id'] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewItem<?= $review['id'] ?>Modal">View Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="align-middle" scope="row"><?= $review['item']['id'] ?></th>
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="<?= $review['item']['img'] ?>"></td>
                    <td class="align-middle"><?= $review['item']['name'] ?></td>
                    <td class="align-middle"><?= $review['item']['price'] ?>€</td>
                    <td class="align-middle"><?= $review['item']['category'] ?></td>
                    <td class="align-middle"><?= $review['item']['subcategory'] ?></td>
                    <td class="align-middle"><?= $review['item']['stock'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" onclick="location.href='/admin/orders.php?order=<?= $review['order'] ?>'">
        Go to Order #<?= $review['order'] ?>
      </button>
    </td>
    <td class="align-middle"><?= $review['timestamp'] ?></td>
    <td class="align-middle"><?= $review['score'] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewReview<?= $review['id'] ?>Content">
        View Content
      </button>
      <!-- Modal -->
      <div class="modal fade" id="viewReview<?= $review['id'] ?>Content" tabindex="-1" role="dialog" aria-labelledby="viewContent<?= $review['id'] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewContent<?= $review['id'] ?>Modal"><?= $review['title'] ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-justify"><?= $review['body'] ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td class="align-middle">
      <button type="button" class="btn btn-link a_link">
        Delete
      </button>
    </td>
  </tr>
<?php }

/**
 * Function to user row
 */
function draw_user_row($user)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $user['id'] ?></th>
    <td class="align-middle"><?= $user['firstName'] ?></td>
    <td class="align-middle"><?= $user['lastName'] ?></td>
    <td class="align-middle"><?= $user['email'] ?>/td>
    <td class="align-middle"><?= $user['phone'] ?></td>
    <td class="align-middle"><?= $user['birthday'] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewUser<?= $user['id'] ?>">
        View Billing
      </button>
      <!-- Modal -->
      <div class="modal fade" id="viewUser<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="viewUser<?= $user['id'] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewUser<?= $user['id'] ?>Modal">Billing Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">Credit Card</th>
                    <th scope="col">Address 1</th>
                    <th scope="col">Address 2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle"><?= $user['card'] ?></td>
                    <td class="align-middle"><?= $user['address1'] ?></td>
                    <td class="align-middle"><?= $user['address2'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td class="align-middle">
      <button type="button" class="btn btn-link a_link">
        Delete
      </button>
    </td>
  </tr>
<?php }

/**
 * Function to sales row
 */
function draw_sale_row($sale)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $sale['id'] ?></th>
    <td class="align-middle"><?= $sale['name'] ?></td>
    <td class="align-middle"><?= $sale['startTimestamp'] ?></td>
    <td class="align-middle"><?= $sale['endTimestamp'] ?></td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary" onclick="location.href='/admin/add_sale.php?sale=<?= $sale['id'] ?>'">Edit</button>
      <button type="button" class="btn btn-link a_link">Remove</button>
    </td>
  </tr>
<?php }

/**
 * Function to sales row
 */
function draw_product_add_sale_row($product)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $product['id'] ?></th>
    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="<?= $product['img'] ?>"></td>
    <td class="align-middle"><?= $product['name'] ?></td>
    <td class="align-middle"><?= $product['price'] ?>€</td>
    <td class="align-middle">
      <button type="button" class="btn button-secondary">Add</button>
    </td>
  </tr>
<?php }

/**
 * Function to sales row
 */
function draw_product_remove_sale_row($product)
{ ?>
  <tr>
    <th class="align-middle" scope="row"><?= $product['id'] ?></th>
    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="<?= $product['img'] ?>"></td>
    <td class="align-middle"><?= $product['name'] ?></td>
    <td class="align-middle"><?= $product['price'] ?>€</td>
    <td class="align-middle">
      <button type="button" class="btn btn-link a_link">Remove</button>
    </td>
  </tr>
<?php }

/**
 * Function to sales row
 */
function draw_faq_row($question)
{ ?>
  <div class="d-flex justify-content-between align-items-start flex-wrap">
    <h3><?= $question['question'] ?></h3>
    <div>
      <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#editQuestion<?= $question['id'] ?>Modal">
        Edit
      </button>
      <div class="modal fade" id="editQuestion<?= $question['id'] ?>Modal" tabindex="-1" role="dialog" aria-labelledby="question<?= $question['id'] ?>Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="question<?= $question['id'] ?>Modal">Edit Frequently Asked Question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="question<?= $question['id'] ?>Title">Question</label>
                  <input type="text" class="form-control" id="question<?= $question['id'] ?>Title" value="<?= $question['question'] ?>" placeholder="Write question here...">
                </div>
                <div class="form-group">
                  <label for="question<?= $question['id'] ?>Answer">Answer</label>
                  <textarea class="form-control" id="<?= $question['id'] ?>Answer" rows="5" placeholder="Write answer here..."><?= $question['answer'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="question1Number">Question number:</label>
                  <select class="form-control" id="question1Number">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
              <button type="button" class="btn button">Add Question</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-justify">
    <p>
      <?= $question['answer'] ?>
    </p>
  </div>
<?php }
