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
    <!-- custom bootstrap -->
    <link rel="stylesheet" href="../css/admin.css">
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
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <div class="collapse navbar-collapse my-2">

          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Artifact Ink</a>

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
 * Function to draw admin area top navbar
 */
function draw_sidebar()
{ ?>
    <div class="container-fluid">
      <div class="row">
        <!-- side bar with options -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Admin Dashboard</h6>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <i>ICON</i>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Reviews
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Sales
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Make Newsletter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  FAQ
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i>ICON</i>
                  Info
                </a>
              </li>
            </ul>


          </div>
        </nav>
      </div>
    </div>

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

?>