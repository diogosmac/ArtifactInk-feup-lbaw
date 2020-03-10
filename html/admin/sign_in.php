<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Artifact Ink Admin</title>
  <meta charset="UTF-8">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/sign_in.css">
  <!-- custom js -->
  <script src="../script/admin.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

  <div class="container">
    <div class="row">
      <form class="form-signin ">
        <a href="../pages/home.php">
          <img class="mb-4" src="../images/artifact_ink_letters_white.svg" alt="ArtifactInk" width="300" height="72">
        </a>
        <div class="sign-box">
          <h1 class="h3 mb-3 font-weight-normal">Admin Sign In</h1>
          <div class="form-group email-input">
            <label for="inputAdminUsername">Admin Username</label>
            <input type="text" class="form-control" id="inputAdminUsername" aria-describedby="emailHelp">
          </div>
          <div class="form-group password-input">
            <label for="inputAdminPassword">Password</label>
            <input type="password" class="form-control" id="inputAdminPassword">
          </div>
          <button class="btn btn-lg btn-secondary btn-block" type="button" onclick="location.href='/admin/home.php'">Sign in</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>
