<?php
include_once("../templates/tpl_common.php");

draw_header();

?>
<main>
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Ink</a></li>
                <li class="breadcrumb-item"><a href="#">Subcat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Black Ink</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-center flex-row bd-highlight mb-3">
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
        </div>
    </section>
    <section id="related">

    </section>
    <section id="specs">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Technical Specs</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> Looots of tech specs </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
        </div>
    </section>
</main>

<?php

draw_footer();

?>