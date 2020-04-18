<li class="p-3 list-group-item li-item">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 px-1">
                    <a href="/product/1" class="list-img-link">
                    <div>
                        <img src="https://images-na.ssl-images-amazon.com/images/I/61TBsibBdqL._SX425_.jpg" class="card-img-top image-fit" alt="...">
                    </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="../pages/product.php" class="list-img-link">
                        <h3 class="font-weight-bold"> <!---->Product Name </h3>
                    </a>

                    <div class="py-2 d-flex flex-row bd-highlight justify-content-between">
                        <div>
                            @include('partials.rating_stars', [] )
                            <a href="#specs" class="px-2 a_link"> (<!--No ratings-->)</a>
                            
                        </div>
                    </div>
                    <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
                        <div>
                            <i class="fas fa-circle circle-available"></i>
                            Available
                        </div>
                    </div>
                    <div class="py-1 pt-4 d-flex flex-row bd-highlight justify-content-between">
                        <span>  
                            <label for="li-item-qty">Qty.</label>
                            <input class="li-item-qty" type="number" value="1" min="1">
                        </span>
                        <a href="#" class="li-wishlist a_link">
                            <i class="fas fa-heart"></i>
                            Add to Whishlist
                        </a>
                    </div>

                </div>
                <div class="py-2 col-sm-3 d-flex flex-column justify-content-between align-items-end li-price-button">
                    <h3 class="font-weight-bold" style="color: var(--main-red)">50,2€</h3>
                    <a href="#" class="btn button">Add to Cart</a>
                </div>
            </div>
        </div>
    </li>