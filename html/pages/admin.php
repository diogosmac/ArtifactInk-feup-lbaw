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

  <header>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">
      <!-- side bar with options -->
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Admin Dashboard</h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i></i>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i></i>
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i></i>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-bell"></i>
                Notifications
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Reports</h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i></i>
                Dashboard<span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i></i>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i></i>
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i></i>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i></i>
                Orders
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

</body>

<footer class="footer">
  Copyright © 2020 LBAW FEUP
</footer>

</html>