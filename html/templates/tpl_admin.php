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
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/admin.css">
    <!-- custom js -->
    <script src="../js/admin.js"></script>
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

          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/admin/">Artifact Ink Admin</a>

          <ul class="navbar-nav ml-auto mr-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
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
    Copyright © 2020 LBAW FEUP
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
          <a class="nav-link <?php echo $currentPage == "home" ? ' active' : '' ?>" href="/admin">
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
        <a class="nav-link" href="#">
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

function draw_home()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("home") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Overview</h1>
          </div>

          <div class="row mx-auto my-2">

            <div class="col-lg-3 col-md-6 col-sm-6 py-2">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Users</h4>
                  <table class="table table-sm mb-0">
                    <tbody>
                      <tr>
                        <td scope="">Users Registered</td>
                        <td>675</td>
                      </tr>
                      <tr>
                        <td scope="row">Users Online</td>
                        <td>12</td>
                      </tr>
                      <tr>
                        <td scope="row">Site Visitors</td>
                        <td>8694</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 py-2">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Products</h4>
                  <table class="table table-sm mb-0">
                    <tbody>
                      <tr>
                        <td scope="row">Total Products</td>
                        <td>98</td>
                      </tr>
                      <tr>
                        <td scope="row">Products On Sale</td>
                        <td>14</td>
                      </tr>
                      <tr>
                        <td scope="row">Product Views</td>
                        <td>8694</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 py-2">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Orders</h4>
                  <table class="table table-sm mb-0">
                    <tbody>
                      <tr>
                        <td scope="row">Total Orders</td>
                        <td>562</td>
                      </tr>
                      <tr>
                        <td scope="row">Orders Shipped</td>
                        <td>496</td>
                      </tr>
                      <tr>
                        <td scope="row">Orders Received</td>
                        <td>365</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 py-2">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Reviews</h4>
                  <table class="table table-sm mb-0">
                    <tbody>
                      <tr>
                        <td scope="row">Total Reviews</td>
                        <td>134</td>
                      </tr>
                      <tr>
                        <td scope="row">Average Per Product</td>
                        <td>2.7</td>
                      </tr>
                      <tr>
                        <td scope="row">Incomplete Reviews</td>
                        <td>27</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="container">
          <div class="mb-4 border-bottom mt-2">
            <h1>Notifications</h1>
          </div>

          <div class="mx-auto my-2">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Category</th>
                  <th scope="col">#</th>
                  <th scope="col">Description</th>
                  <th scope="col">Timestamp</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th class="align-middle" scope="row">Products</th>
                  <td class="align-middle">234</td>
                  <td class="align-middle">Product "Dynamic Black Ink" #45 is out of stock</td>
                  <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
                  <td class="align-middle"><button type="button" class="btn btn-link py-0">Clear</button></td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">Review</th>
                  <td class="align-middle">134</td>
                  <td class="align-middle">User miguel123 made a review on order #541</td>
                  <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
                  <td class="align-middle"><button type="button" class="btn btn-link py-0">Clear</button></td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">Order</th>
                  <td class="align-middle">541</td>
                  <td class="align-middle">User miguel123 made a new order</td>
                  <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
                  <td class="align-middle"><button type="button" class="btn btn-link py-0">Clear</button></td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">Users</th>
                  <td class="align-middle">675</td>
                  <td class="align-middle">User miguel123 just signed up</td>
                  <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
                  <td class="align-middle"><button type="button" class="btn btn-link py-0">Clear</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


      </main>
    </div>
  </div>

<?php }

function draw_products()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("products") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Products</h1>
          </div>

          <div class="d-flex align-items-center">
            <div class="input-group my-3 mr-sm-2">
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
<?php }

function draw_add_product()
{ ?>
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
<?php }

function draw_categories()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("categories") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Categories</h1>
          </div>

        </div>
      </main>

    </div>
  </div>
<?php }

function draw_orders()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("orders") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Orders</h1>
          </div>

        </div>
      </main>

    </div>
  </div>
<?php }

function draw_reviews()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("reviews") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Reviews</h1>
          </div>

        </div>
      </main>

    </div>
  </div>
<?php }

function draw_users()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("users") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Users</h1>
          </div>

        </div>
      </main>

    </div>
  </div>
<?php }

function draw_add_sale()
{ ?>
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
<?php }

function draw_sales()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("sales") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 border-bottom mt-2">
            <h1>Sales</h1>
          </div>

          <div class="d-flex align-items-center">
            <div class="input-group my-3 mr-sm-2">
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
<?php }

function draw_newsletter()
{ ?>
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
<?php }

function draw_faq()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("faq") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
            <h1>Frequently Asked Questions</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
              Add Question
            </button>
            <!-- Modal -->
            <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="question0Modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="question0Modal">Add Frequently Asked Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="questionTitle">Question</label>
                        <input type="text" class="form-control" id="questionTitle" placeholder="Write question here...">
                      </div>
                      <div class="form-group">
                        <label for="questionAnswer">Answer</label>
                        <textarea class="form-control" id="questionAnswer" rows="5" placeholder="Write answer here..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="questionNumber">Question number:</label>
                        <select class="form-control" id="questionNumber">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option selected>4</option>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Question</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="mx-auto my-2">

            <div class="d-flex justify-content-between align-items-start flex-wrap">
              <h3>Lorem ipsum dolor sit amet?</h3>
              <div>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editQuestion1Modal">
                  Edit
                </button>
                <div class="modal fade" id="editQuestion1Modal" tabindex="-1" role="dialog" aria-labelledby="question1Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="question1Modal">Edit Frequently Asked Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="question1Title">Question</label>
                            <input type="text" class="form-control" id="question1Title" value="Lorem ipsum dolor sit amet?" placeholder="Write question here...">
                          </div>
                          <div class="form-group">
                            <label for="question1Answer">Answer</label>
                            <textarea class="form-control" id="question1Answer" rows="5" placeholder="Write answer here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.</textarea>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Question</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-justify">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.
              </p>
              <p>
                Sed vitae mattis magna. Maecenas tortor libero, maximus sit amet dictum nec, venenatis nec nulla. Nunc eu dapibus eros, ut iaculis justo. Integer auctor condimentum massa, eget aliquam eros dictum ut. Donec ac vestibulum orci. Donec et sodales nulla. In mauris massa, condimentum ut tellus ornare, aliquet luctus sapien. Cras id sagittis turpis. Quisque sed porta libero. Quisque vitae orci fringilla, porta justo in, sollicitudin sem. Donec sit amet finibus lectus. Nulla tincidunt sit amet tortor et venenatis. Ut tincidunt magna a convallis ornare. Cras porttitor dolor at turpis congue, eu cursus nisl fringilla. Curabitur a eleifend dui, commodo ornare quam.
              </p>
              <p>
                Maecenas pulvinar purus id mauris lacinia euismod. Morbi pretium cursus nulla, sed volutpat urna. Sed efficitur arcu et nibh accumsan, ac faucibus neque feugiat. Phasellus id eros finibus, tincidunt quam et, blandit magna. Curabitur quis mollis mauris. Sed faucibus nulla risus, at volutpat ligula maximus a. Sed tellus tellus, mollis quis justo quis, porttitor scelerisque metus. Praesent enim est, posuere nec sodales ut, placerat id arcu. Praesent iaculis vulputate quam, egestas porttitor eros bibendum vel. Integer semper enim ligula, quis fermentum augue iaculis vitae. Donec gravida et erat eget eleifend. Morbi sagittis dapibus tempus. Nulla gravida massa varius pellentesque ultricies. Suspendisse orci erat, maximus vulputate laoreet eget, lacinia eget lacus. Donec congue feugiat sapien in tincidunt.
              </p>
            </div>

            <div class="d-flex justify-content-between align-items-start flex-wrap">
              <h3>Lorem ipsum dolor sit amet?</h3>
              <div>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editQuestion2Modal">
                  Edit
                </button>
                <div class="modal fade" id="editQuestion2Modal" tabindex="-1" role="dialog" aria-labelledby="question2Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="question2Modal">Edit Frequently Asked Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="question2Title">Question</label>
                            <input type="text" class="form-control" id="question2Title" value="Lorem ipsum dolor sit amet?" placeholder="Write question here...">
                          </div>
                          <div class="form-group">
                            <label for="question2Answer">Answer</label>
                            <textarea class="form-control" id="question2Answer" rows="5" placeholder="Write answer here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.</textarea>
                          </div>
                          <div class="form-group">
                            <label for="question2Number">Question number:</label>
                            <select class="form-control" id="question2Number">
                              <option>1</option>
                              <option selected>2</option>
                              <option>3</option>
                            </select>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Question</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-justify">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.
              </p>
              <p>
                Sed vitae mattis magna. Maecenas tortor libero, maximus sit amet dictum nec, venenatis nec nulla. Nunc eu dapibus eros, ut iaculis justo. Integer auctor condimentum massa, eget aliquam eros dictum ut. Donec ac vestibulum orci. Donec et sodales nulla. In mauris massa, condimentum ut tellus ornare, aliquet luctus sapien. Cras id sagittis turpis. Quisque sed porta libero. Quisque vitae orci fringilla, porta justo in, sollicitudin sem. Donec sit amet finibus lectus. Nulla tincidunt sit amet tortor et venenatis. Ut tincidunt magna a convallis ornare. Cras porttitor dolor at turpis congue, eu cursus nisl fringilla. Curabitur a eleifend dui, commodo ornare quam.
              </p>
              <p>
                Maecenas pulvinar purus id mauris lacinia euismod. Morbi pretium cursus nulla, sed volutpat urna. Sed efficitur arcu et nibh accumsan, ac faucibus neque feugiat. Phasellus id eros finibus, tincidunt quam et, blandit magna. Curabitur quis mollis mauris. Sed faucibus nulla risus, at volutpat ligula maximus a. Sed tellus tellus, mollis quis justo quis, porttitor scelerisque metus. Praesent enim est, posuere nec sodales ut, placerat id arcu. Praesent iaculis vulputate quam, egestas porttitor eros bibendum vel. Integer semper enim ligula, quis fermentum augue iaculis vitae. Donec gravida et erat eget eleifend. Morbi sagittis dapibus tempus. Nulla gravida massa varius pellentesque ultricies. Suspendisse orci erat, maximus vulputate laoreet eget, lacinia eget lacus. Donec congue feugiat sapien in tincidunt.
              </p>
            </div>

            <div class="d-flex justify-content-between align-items-start flex-wrap">
              <h3>Lorem ipsum dolor sit amet?</h3>
              <div>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editQuestion3Modal">
                  Edit
                </button>
                <div class="modal fade" id="editQuestion3Modal" tabindex="-1" role="dialog" aria-labelledby="question3Modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="question3Modal">Edit Frequently Asked Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="question3Title">Question</label>
                            <input type="text" class="form-control" id="question3Title" value="Lorem ipsum dolor sit amet?" placeholder="Write question here...">
                          </div>
                          <div class="form-group">
                            <label for="question3Answer">Answer</label>
                            <textarea class="form-control" id="question3Answer" rows="5" placeholder="Write answer here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.</textarea>
                          </div>
                          <div class="form-group">
                            <label for="question3Number">Question number:</label>
                            <select class="form-control" id="question3Number">
                              <option>1</option>
                              <option selected>2</option>
                              <option>3</option>
                            </select>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Question</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-justify">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra dui libero, a venenatis justo fermentum at. Cras id tellus quis ex aliquam egestas. Pellentesque vel erat vitae libero semper consectetur. Mauris ligula ante, aliquet interdum lobortis non, elementum non dolor. Vestibulum sodales pulvinar pellentesque. Sed eget volutpat metus, non vulputate nulla. Nulla in elit quam. Donec pulvinar, felis hendrerit molestie volutpat, lectus risus luctus ipsum, ut suscipit nibh dolor eu arcu. Ut efficitur commodo fermentum. Sed et laoreet diam, vel mattis diam.
              </p>
              <p>
                Sed vitae mattis magna. Maecenas tortor libero, maximus sit amet dictum nec, venenatis nec nulla. Nunc eu dapibus eros, ut iaculis justo. Integer auctor condimentum massa, eget aliquam eros dictum ut. Donec ac vestibulum orci. Donec et sodales nulla. In mauris massa, condimentum ut tellus ornare, aliquet luctus sapien. Cras id sagittis turpis. Quisque sed porta libero. Quisque vitae orci fringilla, porta justo in, sollicitudin sem. Donec sit amet finibus lectus. Nulla tincidunt sit amet tortor et venenatis. Ut tincidunt magna a convallis ornare. Cras porttitor dolor at turpis congue, eu cursus nisl fringilla. Curabitur a eleifend dui, commodo ornare quam.
              </p>
              <p>
                Maecenas pulvinar purus id mauris lacinia euismod. Morbi pretium cursus nulla, sed volutpat urna. Sed efficitur arcu et nibh accumsan, ac faucibus neque feugiat. Phasellus id eros finibus, tincidunt quam et, blandit magna. Curabitur quis mollis mauris. Sed faucibus nulla risus, at volutpat ligula maximus a. Sed tellus tellus, mollis quis justo quis, porttitor scelerisque metus. Praesent enim est, posuere nec sodales ut, placerat id arcu. Praesent iaculis vulputate quam, egestas porttitor eros bibendum vel. Integer semper enim ligula, quis fermentum augue iaculis vitae. Donec gravida et erat eget eleifend. Morbi sagittis dapibus tempus. Nulla gravida massa varius pellentesque ultricies. Suspendisse orci erat, maximus vulputate laoreet eget, lacinia eget lacus. Donec congue feugiat sapien in tincidunt.
              </p>
            </div>

          </div>
        </div>


    </div>
  </div>
<?php }

function draw_info()
{ ?>
  <div class="container-fluid">
    <div class="row">

      <?php draw_sidebar("info") ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

          <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
            <h1>General Information</h1>
            <button onclick="editGeneralInfo()" type="button" class="btn btn-primary">
              Edit Information
            </button>
          </div>
          <div class="mt-2">
            <div id="infoSubmitButtons" class="d-flex mt-2 flex-row-reverse my-2 info-submit-buttons">
              <button onclick="saveGeneralInfo()" type="button" class="btn btn-primary mx-1">
                Save Information
              </button>
              <button onclick="cancelGeneralInfo()" type="button" class="btn btn-secondary mx-1">
                Cancel
              </button>
            </div>
            <div class="text-justify" id="generalInfo">
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
              </p>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
              </p>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
              </p>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
              </p>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates assumenda nihil inventore sed laudantium earum ipsa. Accusamus accusantium aliquid ducimus aperiam dicta, animi, dolor esse asperiores tenetur at voluptate aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore labore rem quo molestias! Nihil velit doloribus sint fugit repellat? Consectetur laborum tenetur similique. Ex laudantium eaque quibusdam dolorem eum voluptatum?
              </p>
            </div>
          </div>
        </div>
      </main>

    </div>
  </div>
<?php }
?>