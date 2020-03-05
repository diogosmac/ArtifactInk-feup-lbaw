<?php

function draw_wishlist_product() { ?>

<section id="product" class="my-4">
    <div class="row">
        <div class="col-md-3">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1"
                alt="Ink" class="img-fluid">
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <h3>Product Name</h3>
                </div>
                <button type="button" class="col-md-2 btn btn-outline-danger"><i class="material-icons"
                        style="color: red;">favorite</i></button>
            </div>
            <div class="row">
                <div class="col ml-3">
                    <div class="row">
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star_half</i>
                        <i class="material-icons" style="color: gold;">star_outline</i>
                    </div>
                    <div class="row">
                        <h4>Available</h4>
                        <i class="material-icons" style="color: green;">fiber_manual_record</i>
                    </div>
                </div>
                <div class="col-md-2 mt-2"><h3>Price</h3></div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="input-group-text" for="inputGroupSelect01">QTY</label>
                </div>
                <div class="col-md-3">
                    <input class="btn btn-primary" type="submit" value="Add to Cart">
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="d-flex justify-content-center flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" style="width: 420px">
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" style="width: 120px">

                    </div>
                    <div class="p-2 bd-highlight">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" style="width: 120px">

                    </div>
                    <div class="p-2 bd-highlight">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" style="width: 120px">

                    </div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-sm-around">
                <h1>Le Product Name</h1>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <i class="material-icons" style="color: gold;">star</i>
                    <i class="material-icons" style="color: gold;">star</i>
                    <i class="material-icons" style="color: gold;">star</i>
                    <i class="material-icons" style="color: gold;">star_half</i>
                    <i class="material-icons" style="color: gold;">star_outline</i>
                </div>
                <div class="d-flex flex-row justify-content-start bd-highlight mb-3">
                    <h4>Available</h4>
                    <i class="material-icons" style="color: green;">fiber_manual_record</i>
                </div>
                <div class="d-flex flex-row justify-content-between bd-highlight mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Quantity</label>
                        </div>
                        <select class="custom-select">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <h2>17.80Eur</h2>
                </div>
                <div class="d-flex flex-row justify-content-around bd-highlight mb-3">
                    <button type="button" class="btn btn-outline-danger"><i class="material-icons" style="color: red;">favorite</i></button>
                    <input class="btn btn-primary" type="submit" value="Add to Cart">
                </div>

            </div>
        </div> -->
</section>


<?php }

?>