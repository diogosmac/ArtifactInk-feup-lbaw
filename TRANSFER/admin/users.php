<?php
include_once("../templates/tpl_admin.php");

draw_header();
draw_navbar();
?>

<div class="container-fluid">
  <div class="row">

    <?php draw_sidebar("users") ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="container">

        <div class="mb-4 border-bottom mt-2">
          <h1>Users</h1>
        </div>

        <div class="input-group my-3 mr-sm-2">
          <input class="form-control" placeholder="Search User" aria-label="Search User">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
              Filter
            </button>
          </div>
        </div>

        <div class="collapse" id="collapseFilter">
          <div class="row align-items-center justify-content-around">
            <div class="form-row col-12">
              <!-- User ID -->
              <div class="form-group col-md-2">
                <label for="inputUserID">User ID</label>
                <input type="number" min=1 class="form-control" id="inputUserID">
              </div>
              <!-- Email -->
              <div class="form-group col-md-3">
                <label for="inputUserEmail">Email</label>
                <input type="text" class="form-control" id="inputUserEmail" placeholder="Item name">
              </div>
              <!-- Phone Number -->
              <div class="form-group col-md-3">
                <label for="inputUserPhone">Phone Number</label>
                <input type="text" class="form-control" id="inputUserPhone" placeholder="Item name">
              </div>
              <!-- Min Date -->
              <div class="form-group col-md-2">
                <label for="inputMinDate">Minimum Date</label>
                <input type="date" class="form-control" id="inputMinDate">
              </div>
              <!-- Max Date -->
              <div class="form-group col-md-2">
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
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Date Of Birth</th>
              <th scope="col">Billing</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $users = array(
              // user 3
              array(
                "id" => 3,
                "firstName" => "João",
                "lastName" => "Massa",
                "email" => "joao.massinhas@siaga.com",
                "phone" => "+351 987 876 453",
                "birthday" => "25-04-1974",
                "card" => "MasterCard XXXX-XXXX-XXXX-1234",
                "address1" => "Address Banana, 123 - 6ª esq frente",
                "address2" => "Avenida Sérgio Sobral Nunes, 123 - 6ª esq frente"
              ),
              // user 2
              array(
                "id" => 2,
                "firstName" => "Joana",
                "lastName" => "Banana",
                "email" => "joaninha@frutas.com",
                "phone" => "+351 987 876 453",
                "birthday" => "25-04-1974",
                "card" => "VISA XXXX-XXXX-XXXX-9876",
                "address1" => "Address Banana, 123 - 6ª esq frente",
                "address2" => "Avenida Sérgio Sobral Nunes, 123 - 6ª esq frente"
              ),
              // user 1
              array(
                "id" => 1,
                "firstName" => "Manuel",
                "lastName" => "Coutinho",
                "email" => "mc.coutinho@fe.up.pt",
                "phone" => "+351 987 876 453",
                "birthday" => "25-04-1974",
                "card" => "PayPal mc.coutinho@fe.up.pt",
                "address1" => "Address Banana, 123 - 6ª esq frente",
                "address2" => "Avenida Sérgio Sobral Nunes, 123 - 6ª esq frente"
              )
            );


            foreach ($users as $user) {
              draw_user_row($user);
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