<?php function draw_profile_info()
{ ?>

  <section id="profile-info">
    <div class="col">

      <div class="row" id="profile-tag">
        <span>Photo</span>
      </div>

      <div class="row align-content-center d-md-none">
        <img class="rounded-circle" src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg" alt="Person" class="img-fluid">
      </div>

      <div class="d-none d-md-block my-4">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-auto" id="profile-photo">
            <img class="rounded-circle" src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg" alt="Person" class="img-fluid">
          </div>

          <form>
            <div class="form-group">
              <label for="exampleFormControlFile1">Upload new photo</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
          </form>

          <div class="col-md-auto d-flex flex-column" id="profile-edit-button">
            <button class="btn button-secondary" type="button">Update Profile</button>
            <button class="btn btn-link a_link" type="button">Delete Account</button>
          </div>
        </div>
      </div>

      <hr>

      <div class="row" id="profile-tag">
        <span>General</span>
      </div>
      <form>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputFirstName">First Name</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" value="John">
          </div>
          <div class="form-group col-md-4">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" value="Doe">
          </div>
          <div class="form-group col-md-4">
            <label for="inputBirthday">Date of Birth</label>
            <input type="date" class="form-control" id="inputBirthday">
          </div>
        </div>
      </form>

      <hr>

      <div class="row" id="profile-tag">
        <span>Contact</span>
      </div>
      <form>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputFirstName" placeholder="Email" value="john@doe.co.uk">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Phone Number" value="+351 912345678">
          </div>
        </div>
      </form>

      <hr>

      <div class="row" id="profile-tag">
        <span>Change Password</span>
      </div>
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNewPassword">New Password</label>
            <input type="password" class="form-control" id="inputNewPassword" placeholder="Password">
          </div>
          <div class="form-group col-md-6">
            <label for="inputRepeatPassword">Repeat Password</label>
            <input type="text" class="form-control" id="inputRepeatPassword" placeholder="Repeat Password">
          </div>
        </div>
      </form>

      <hr>

      <div class="row" id="profile-tag">
        <span>Billing</span>
      </div>
      <div class="col my-2" id="profile-card">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="row profile-field">Credit Card</span>
            <span>MasterCard ending in XXXX</span>
          </div>
          <button class="btn button-secondary">Edit Card</button>
        </div>
      </div>

      <div class="col my-2" id="profile-address">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="row profile-field">Address 1</span>
            <span>Address St., 123 - 6º Esq. Frente</span>
          </div>
          <button class="btn button-secondary">Edit Adress</button>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="row profile-field">Address 2</span>
            <span>Avenida de Sérgio Sobral Nunes, 2020</span>
          </div>
          <button class="btn button-secondary">Edit Adress</button>
        </div>
      </div>

      <div class="row justify-content-center d-md-none my-3">
        <button class="btn button-secondary" type="button">Edit Profile</button>
        <button class="btn btn-link a_link" type="button">Delete Account</button>
      </div>
    </div>
  </section>

<?php } ?>


<?php function draw_product_review()
{ ?>

  <section id="product-review">
    <div class="row" id="review-container">
      <div class="col-md-4">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" class="img-fluid">
      </div>
      <div class="col" id="product-review-info">

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-product-name float-left">Black Ink</span>

          <button type="button" class="btn button-secondary float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-pen pr-2"></i>Edit
          </button>

          <!-- MODAL -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Review on Black Ink</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Review Title</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" value="Cor viva, pouco resistente." placeholder="Write question here...">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Review</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn button">Save changes</button>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-title">Cor viva, pouco resistente.</span>
          <div>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
          </div>
        </div>

        <p class="my-1 text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
          fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
  </section>

<?php } ?>

<?php function draw_wishlist_product()
{ ?>
  <li class="p-3 list-group-item li-item">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <a href="../pages/product.php" class="list-img-link">
            <img src="https://images-na.ssl-images-amazon.com/images/I/61TBsibBdqL._SX425_.jpg" class="card-img-top" alt="...">
          </a>
        </div>
        <div class="col-sm-6">
          <a href="../pages/product.php" class="list-img-link">
            <h3 class="font-weight-bold"> Tattoo Machine </h3>
          </a>

          <div class="py-2 d-flex flex-row bd-highlight justify-content-between">
            <div>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <a href="#specs" class="px-2 a_link"> (2)</a>

            </div>
          </div>
          <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
            <div>
              <i class="fas fa-circle circle-available"></i>
              Available
            </div>
          </div>
          <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
            <span>
              <label for="li-item-qty">Qty.</label>
              <input class="li-item-qty" type="number" value="1" min="1">
            </span>
          </div>

        </div>
        <div class="py-2 col-sm-3 d-flex flex-column justify-content-between align-items-end li-price-button">
          <h3 class="font-weight-bold" style="color: var(--main-red)">35.95€</h3>
          <a href="#" class="btn button">Add to Cart</a>
        </div>
      </div>
    </div>
  </li>
<?php } ?>

<?php function draw_purchase_item()
{ ?>

  <div class="row align-items-center">
    <div class="col-md-3" id="purchase-history-item-picture">
      <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" class="img-fluid">
    </div>
    <div class="col my-2" id="purchase-history-item-data">
      <div class="row">
        <span>Product Name ABC</span>
      </div>
      <div class="row">
        <span>13.99€</span>
      </div>
    </div>
  </div>

<?php } ?>

<?php function draw_history_item()
{ ?>

  <section id="history-purchase">
    <div class="col" id="review-container">
      <div class="row" id="purchase-address">
        <span>Address St., 123 - 6º Esq. Frente</span>
      </div>
      <div class="row" id="purchase-details">
        <span>27/02/2020</span>
        <span>&nbsp;-&nbsp;</span>
        <span>Shipped</span>
      </div>

      <div class="col my-3" id="purchase-items-container">
        <?php draw_purchase_item() ?>
        <hr>
        <?php draw_purchase_item() ?>
      </div>

      <div class="row" id="purchase-shipping">
        <span>2,02€</span>
      </div>
      <div class="row" id="purchase-total">
        <span>30,00€</span>
      </div>
  </section>

<?php } ?>

<?php function draw_profile_info_mobile()
{ ?>

  <section id="profile-info">
    <div class="mx-5">
      <div class="col">
        <div class="row">
          <h1 class="display-1"><strong>Photo</strong></h1>
        </div>
        <div class="row align-items-center">
          <div class="col">
            <img src="https://i1.rgstatic.net/ii/profile.image/731946594365440-1551521075108_Q512/Manuel_Torres42.jpg" alt="Person" class="img-fluid w-100 p-3">
          </div>
          <div class="col-md-auto" id="profile-edit-button">
            <button class="btn btn-primary">
              <h1 class="display-1">
                Edit
              </h1>
            </button>
          </div>
        </div>
      </div>

      <hr>

      <div class="row" id="profile-tag">
        <h1 class="display-1"><strong>General</strong></h1>
      </div>
      <div id="profile-name">
        <h1 class="display-2">Name</h1>
        <h1 class="display-4">John Doe</h1>
      </div>
      <div id="profile-dob">
        <h1 class="display-2">Date of Birth</strong></h1>
        <h1 class="display-4">25-04-1974</h1>
      </div>

      <hr>

      <div class="row" id="profile-tag">
        <h1 class="display-1"><strong>Contact</strong></h1>
      </div>
      <div id="profile-email">
        <h1 class="display-2">E-mail</h1>
        <h1 class="display-4">john@doe.co.uk</h1>
      </div>
      <div id="profile-phone">
        <h1 class="display-2">Phone Number</h1>
        <h1 class="display-4">+351 912345678</h1>
      </div>

      <hr>

      <div class="row" id="profile-tag">
        <h1 class="display-1"><strong>Billing</strong></h1>
      </div>
      <div id="profile-card">
        <h1 class="display-2">Credit Card</h1>
        <h1 class="display-4">MasterCard ending in XXXX</h1>
      </div>
      <div id="profile-address">
        <h1 class="display-2">Address</h1>
        <h1 class="display-4">Address St., 123 - 6º Esq. Frente</h1>
      </div>
    </div>
  </section>

<?php } ?>