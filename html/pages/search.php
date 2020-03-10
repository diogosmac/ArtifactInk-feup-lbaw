<?php
include_once("../templates/tpl_common.php");
include_once("../templates/tpl_home.php");


draw_header();
draw_navbar(true);
?>
<section class="mx-auto my-4">
    <h3>Search for 'black ink'</h3>
    <div class="d-flex flex-row justify-content-between align-items-center">
        <div>
            <div class="input-group my-3">
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
        </div>
        <div>
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-th-large"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-list"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <?php draw_filters(); ?>
            </div>
            <section class="col-lg-9">
                <div class="tab-content mx-auto" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center"><?php draw_card(); ?></div>
                            <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center"><?php draw_card(); ?></div>
                            <div class="col-12  col-sm-6 col-md-4 d-flex justify-content-center"><?php draw_card(); ?></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<?php

draw_footer();

?>