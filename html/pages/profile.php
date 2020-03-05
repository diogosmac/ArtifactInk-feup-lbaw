<?php

    include_once("../templates/tpl_common.php");
    include_once("../templates/profile_page.php");

    draw_header();
?>

<main>
    <section id="profile-page">
        <div class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link disabled">John Doe</a>
                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                        <a class="nav-link" id="v-pills-reviews-tab" data-toggle="pill" href="#v-pills-reviews"
                            role="tab" aria-controls="v-pills-reviews" aria-selected="false">Reviews</a>
                        <a class="nav-link" id="v-pills-wishlist-tab" data-toggle="pill" href="#v-pills-wishlist"
                            role="tab" aria-controls="v-pills-wishlist" aria-selected="false">Wishlist</a>
                        <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history"
                            role="tab" aria-controls="v-pills-history" aria-selected="false">History</a>
                    </div>
                    <div class="col tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <section id="profile">
                                Mas que profile, este profile!
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel"
                            aria-labelledby="v-pills-reviews-tab">
                            <section id="reviews">
                                Mas que reviews, estas reviews!
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                            aria-labelledby="v-pills-wishlist-tab">
                            <section id="wishlist">
                                Mas que wishlist, esta wishlist!
                                <?php
                                    draw_wishlist_product();
                                    draw_wishlist_product();
                                    draw_wishlist_product();
                                ?>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-history" role="tabpanel"
                            aria-labelledby="v-pills-history-tab">
                            <section id="history">
                                Mas que history, este history!
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

    draw_footer();

?>