<?php
include_once("../templates/tpl_common.php");

draw_header();

draw_navbar(true);
?>
<section class="mx-auto my-4">
    <h1 class="px-2">FAQ</h1>
    <div class="accordion" id="faqs">

<?php
    for ($i = 1; $i <= 6; $i++) {
        draw_faq($i);
    }
?>

    </div>
</section>

<?php

draw_footer();

function draw_faq($id)
{
    $headingId = "heading" . $id;
    $collapseId = "collapse" . $id;
?>
    <div class="card">
        <div class="card-header" id="<?= $headingId ?>">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed a_link" type="button" data-toggle="collapse" data-target="#<?= $collapseId ?>" aria-expanded="false" aria-controls="<?= $collapseId ?>">
                    Question #<?= $id ?>?
                </button>
            </h2>
        </div>
        <div id="<?= $collapseId?>" class="collapse" aria-labelledby="<?= $headingId ?>" data-parent="#faqs">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>

<?php
}
?>