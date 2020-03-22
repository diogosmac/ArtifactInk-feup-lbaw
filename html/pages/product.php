<?php
include_once("../templates/tpl_common.php");
include_once("../templates/tpl_review.php");
include_once("../templates/tpl_home.php");

draw_header();

draw_navbar(true);

?>
<main>
    <section id="product" class="mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mt-2 mb-1">
                <li class="breadcrumb-item"><a href="#" class="a_link">Ink</a></li>
                <li class="breadcrumb-item"><a href="#" class="a_link">Subcat</a></li>
                <li class="breadcrumb-item active" aria-current="page" class="a_link">Black Ink</li>
            </ol>
        </nav>
        <?php
        draw_product();
        ?>
    </section>

    <hr class="w-75">
    <div id="related" class="mx-auto">
        <?php draw_product_deals('Related Items'); ?>
    </div>
    <hr class="w-75">

    <section id="specs" class="mx-auto">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active a_link" id="nav-specs-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Technical Specs</a>
                <a class="nav-item nav-link a_link" id="nav-reviews-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active bg-light p-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>Praesent vitae urna et odio ullamcorper finibus. Nunc dictum malesuada velit, eu molestie ligula. Phasellus ante diam, tempus sed lobortis eu, sollicitudin vel orci. Morbi interdum aliquam bibendum. Sed dapibus risus sit amet viverra aliquam. Suspendisse aliquam odio porttitor sem bibendum, a tempor massa pretium. Etiam eget accumsan magna. Donec euismod neque et metus aliquet sodales. Pellentesque sed enim ut elit maximus fringilla.</p>
                <p>In a pretium mi. Nam mattis laoreet arcu, sit amet bibendum orci mollis vel. Vestibulum pulvinar enim tortor, et fringilla est aliquam in. Fusce nec nulla consequat, rhoncus nisi et, pellentesque sapien. Praesent pulvinar ut lorem eu tristique. Vivamus sit amet lacus sed ante finibus consequat. Donec ac fringilla lectus. Mauris facilisis erat velit, et suscipit eros egestas eget. Vestibulum vel orci in lacus sollicitudin posuere. Maecenas quis congue leo. Nullam ultricies, odio a vehicula sollicitudin, augue nunc commodo libero, vel feugiat tellus lorem non purus. Nam ultricies consectetur purus, vel varius leo viverra eget. </p>
            </div>
            <div class="tab-pane fade bg-light p-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="d-flex flex-row bd-highlight justify-content-around my-2">
                    <div class="d-flex flex-column align-items-center">
                        <div class="d-flex flex-row bd-highlight mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h5>4,5/5</h5>
                    </div>
                    <div>

                    </div>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-primary button">Write a review</button>
                    </div>
                </div>
                <div class="border-top border-dark my-4">
                    <div class="input-group my-3 w-25">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Order by</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="1" selected>Newer</option>
                            <option value="2">Older</option>
                            <option value="3">Rating Lower to Higher</option>
                            <option value="4">Rating Higher to Lower</option>
                        </select>
                    </div>
                    <div class="py-4">
                        <?= draw_review(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php //draw_review_popup(); ?>
    </section>
</main>

<?php

draw_footer();


function draw_product()
{
?>
    <div class="container-fluid d-none d-md-block">
        <div class="row">
            <div class="col-6">
                <img src="https://images-na.ssl-images-amazon.com/images/I/61zfqNDrFPL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height:20em">
                <div class="d-flex flex-row bd-highlight justify-content-center" style="max-height: 25%">
                    <div class="p-2 bd-highlight text-center">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/61zfqNDrFPL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height:100%">
                    </div>
                    <div class="p-2 bd-highlight text-center">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/71rPjaRWUDL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height:100%">
                    </div>
                    <div class="p-2 bd-highlight text-center">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/715F04zdnEL._SL1500_.jpg" alt="" style="max-width: 100%; max-height:100%">
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex flex-column justify-content-start">
                <h2>Product Name</h2>
                <div class="d-flex flex-row align-items-center bd-highlight mb-3">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <a href="#specs" class="px-3 a_link"> 2 reviews</a>
                </div>
                <div class="d-flex flex-row justify-content-start bd-highlight mb-3 py-3 px-0">
                    <h4>Available</h4>
                    <i class="material-icons px-2 pt-1" style="color: green">fiber_manual_record</i>
                </div>
                <div class="d-flex flex-row justify-content-between bd-highlight mb-3 pb-1">
                    <div class="input-group mb-3 w-50 pt-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Quantity</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <h1>17,80€</h1>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-end bd-highlight my-3">
                    <a href="#" class="p-2 li-wishlist">
                        <i class="fas fa-heart"></i>
                        Add to whishlist
                    </a>
                    <input class="btn btn-primary button" type="submit" value="Add to Cart">
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column justify-content-center mx-2 mx-sm-3 d-md-none">
        <h2>Product Name</h2>
        <div class="d-flex flex-row align-items-center bd-highlight mb-3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <a href="#specs" class="px-3 a_link"> 2 reviews</a>
        </div>
        <div class="">
            <img src="https://images-na.ssl-images-amazon.com/images/I/61zfqNDrFPL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height: 20em">
            <div class="d-flex flex-row bd-highlight justify-content-center" style="max-height: 25%">
                <div class="p-2 bd-highlight text-center">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/61zfqNDrFPL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height:100%">
                </div>
                <div class="p-2 bd-highlight text-center">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/71rPjaRWUDL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height:100%">
                </div>
                <div class="p-2 bd-highlight text-center">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/715F04zdnEL._SL1500_.jpg" alt="Ink" style="max-width: 100%; max-height:100%">
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-start bd-highlight mb-3 py-3 px-0">
            <h4>Available</h4>
            <i class="material-icons px-2 pt-1" style="color: green">fiber_manual_record</i>
        </div>
        <div class="d-flex flex-row justify-content-between bd-highlight mb-3 pb-1">
            <div class="input-group mb-3 w-50 pt-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Quantity</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <h1>17,80€</h1>
        </div>
        <div class="d-flex flex-row justify-content-between bd-highlight my-2">
            <a href="#" class="p-2 li-wishlist">
                <i class="fas fa-heart"></i>
                Add to whishlist
            </a>
            <input class="btn btn-primary button" type="submit" value="Add to Cart">
        </div>
    </div>
<?php
}
?>