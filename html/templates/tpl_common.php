<?php
/**
 * Function to draw website header
 */
function draw_header(){ ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Artifact Ink</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ****** faviconit.com favicons ****** -->
	<link rel="shortcut icon" href="../images/faviconit/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="../images/faviconit/favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="../images/faviconit/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="../images/faviconit/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../images/faviconit/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="../images/faviconit/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/faviconit/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/faviconit/favicon-16.png">
	<link rel="apple-touch-icon" href="../images/faviconit/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/faviconit/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/faviconit/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../images/faviconit/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../images/faviconit/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../images/faviconit/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../images/faviconit/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../images/faviconit/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../images/faviconit/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="../images/faviconit/favicon-144.png">
	<meta name="msapplication-config" content="../images/faviconit/browserconfig.xml">
	<!-- ****** faviconit.com favicons ****** -->

    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../fonts/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
    <!--load all styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/carousel_card.css">
    <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <link rel="stylesheet" type="text/css" href="../css/review.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" href="../css/item_list.css">
    <link rel="stylesheet" type="text/css" href="../css/search.css">

    <script src="../script/product_card.js" defer></script>
    <script src="../script/checkout_list.js" defer></script>
    <script src="../script/payment.js" defer></script>
    <script src="../script/address.js" defer></script>
    <script src="../script/mobile_nav.js" defer></script>

</head>

<body>
    <div class="main-container">

        <?php } 

/**
 * Function to draw website navbar
 */
function draw_navbar($session){ ?>
        <div class="fixed-top ">
            <?php 
            draw_main_navbar($session); 
            draw_secondary_navbar();
        ?>
        </div>
        <?php }

function draw_simple_navbar($session){ ?>
        <div class="fixed-top ">
            <nav class="navbar navbar-expand-md navbar-custom-top">
                <a class="navbar-brand" href="../pages/home.php">
                    <img class="d-inline-block align-center" src="../images/artifact_ink_logo_white.png" alt="ArtifactInk"
                        height="40">
                    <img class="d-inline-block align-center" src="../images/artifact_ink_letters_white.png"
                        alt="ArtifactInk" width="125">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarTopSupportedContent" aria-controls="navbarTopSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTopSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <?php if($session){ ?>
                        <li class="nav-item">
                            <div class="btn-group">
                                <a class="btn " href="#" role="button" id="dropdownMenuAccount" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span>
                                        <i class="fas fa-user"></i>
                                    </span>
                                    John Doe
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAccount">
                                    <img class="profile-pic-bubble"
                                        src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg"
                                        alt="John Doe">
                                    <h5 class="dropdown-header">John Doe</h5>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/pages/profile.php">My Account</a>
                                    <a class="dropdown-item" href="#">My Order</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Sign Out</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <?php }

function draw_main_navbar($session){ ?>

        <nav id="desktop-main-nav" class="navbar navbar-expand-md navbar-custom-top">
            <a class="navbar-brand" href="../pages/home.php">
                <img class="d-inline-block align-center" src="../images/artifact_ink_logo_white.png" alt="ArtifactInk"
                    height="40">
                <img class="d-inline-block align-center" src="../images/artifact_ink_letters_white.png" alt="ArtifactInk"
                    width="125">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTopSupportedContent"
                aria-controls="navbarTopSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTopSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search"
                                aria-describedby="search-button">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button" id="search-button">
                                    <a href="/pages/search.php">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if($session == true){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                                <i class="fas fa-heart"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="btn" href="#" role="button" id="dropdownMenuCart" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span>
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-cart dropdown-menu-right"
                                aria-labelledby="dropdownMenuCart">
                                <div class="panel-body">
                                    <ul class="list-group list-cart">
                                        <a class="item-link-cart" href="#">
                                            <li
                                                class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    <img class="cart-item-list-img"
                                                        src="https://i.pinimg.com/originals/03/5d/9e/035d9ee5c531a63269a106d6daa87af0.jpg"
                                                        alt="Cool Tattoo">
                                                </span>
                                                <h5 class="cart-item-list-name">Cool Tattoo</h5>
                                                <h6 class="cart-item-list-price">4.99 €</h6>
                                                <h6 class="badge badge-primary badge-pill cart-item-list-quant">1</h6>
                                            </li>
                                        </a>
                                        <a class="item-link-cart" href="#">
                                            <li
                                                class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    <img class="cart-item-list-img"
                                                        src="https://i.pinimg.com/originals/03/5d/9e/035d9ee5c531a63269a106d6daa87af0.jpg"
                                                        alt="Cool Tattoo">
                                                </span>
                                                <h5 class="cart-item-list-name">Cool Tattoo</h5>
                                                <h6 class="cart-item-list-price">4.99 €</h6>
                                                <h6 class="badge badge-primary badge-pill cart-item-list-quant">1</h6>
                                            </li>
                                        </a>
                                        <a class="item-link-cart" href="#">
                                            <li
                                                class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    <img class="cart-item-list-img"
                                                        src="https://i.pinimg.com/originals/03/5d/9e/035d9ee5c531a63269a106d6daa87af0.jpg"
                                                        alt="Cool Tattoo">
                                                </span>
                                                <h5 class="cart-item-list-name">Cool Tattoo</h5>
                                                <h6 class="cart-item-list-price">4.99 €</h6>
                                                <h6 class="badge badge-primary badge-pill cart-item-list-quant">1</h6>
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                                <div class="d-inline cart-list-total">
                                    <div id="total-label" class="d-inline p-2">
                                        Total
                                    </div>
                                    <div id="price-total" class="d-inline p-2">
                                        33.33 €
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item checkout-button" href="../pages/shopping_cart.php">View Cart</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="btn " href="#" role="button" id="dropdownMenuAccount" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span>
                                    <i class="fas fa-user"></i>
                                </span>
                                John Doe
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAccount">
                                <img class="profile-pic-bubble"
                                    src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg"
                                    alt="John Doe">
                                <h5 class="dropdown-header">John Doe</h5>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/pages/profile.php">My Account</a>
                                <a class="dropdown-item" href="#">My Order</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Sign Out</a>
                            </div>
                        </div>
                    </li>
                    <?php } else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                                <i class="fas fa-heart"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/sign_in.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/sign_in.php">Sign Up</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <!-- mobile nav -->
        <nav id="mobile-main-nav" class="navbar navbar-expand-lg navbar-custom-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarBotSupportedContent" aria-controls="navbarBotSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-toggler-mobile ">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <a class="navbar-brand" href="../pages/home.php">
                    <img class="d-inline-block align-center" src="../images/artifact_ink_logo_white.png" alt="ArtifactInk"
                        height="40">
                    <img class="d-inline-block align-center" src="../images/artifact_ink_letters_white.png"
                        alt="ArtifactInk" width="125">
                </a>
                <?php if($session == true){?>
                <a class="nav-link" href="#">
                    <span>
                        <i class="fas fa-heart"></i>
                    </span>
                </a>
                <div class="btn-group">
                    <a class="btn" href="#" role="button" id="dropdownMenuCart" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span>
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-cart dropdown-menu-right" aria-labelledby="dropdownMenuCart">
                        <div class="panel-body">
                            <ul class="list-group list-cart">
                                <a class="item-link-cart" href="#">
                                    <li
                                        class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <img class="cart-item-list-img"
                                                src="https://i.pinimg.com/originals/03/5d/9e/035d9ee5c531a63269a106d6daa87af0.jpg"
                                                alt="Cool Tattoo">
                                        </span>
                                        <h5 class="cart-item-list-name">Cool Tattoo</h5>
                                        <h6 class="cart-item-list-price">4.99 €</h6>
                                        <h6 class="badge badge-primary badge-pill cart-item-list-quant">1</h6>
                                    </li>
                                </a>
                                <a class="item-link-cart" href="#">
                                    <li
                                        class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <img class="cart-item-list-img"
                                                src="https://i.pinimg.com/originals/03/5d/9e/035d9ee5c531a63269a106d6daa87af0.jpg"
                                                alt="Cool Tattoo">
                                        </span>
                                        <h5 class="cart-item-list-name">Cool Tattoo</h5>
                                        <h6 class="cart-item-list-price">4.99 €</h6>
                                        <h6 class="badge badge-primary badge-pill cart-item-list-quant">1</h6>
                                    </li>
                                </a>
                                <a class="item-link-cart" href="#">
                                    <li
                                        class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <img class="cart-item-list-img"
                                                src="https://i.pinimg.com/originals/03/5d/9e/035d9ee5c531a63269a106d6daa87af0.jpg"
                                                alt="Cool Tattoo">
                                        </span>
                                        <h5 class="cart-item-list-name">Cool Tattoo</h5>
                                        <h6 class="cart-item-list-price">4.99 €</h6>
                                        <h6 class="badge badge-primary badge-pill cart-item-list-quant">1</h6>
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <div class="d-inline cart-list-total">
                            <div id="total-label" class="d-inline p-2">
                                Total
                            </div>
                            <div id="price-total" class="d-inline p-2">
                                33.33 €
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item checkout-button" href="../pages/shopping_cart.php">View Cart</a>
                    </div>
                </div>
                <div class="btn-group">
                    <a class="btn " href="#" role="button" id="dropdownMenuAccount" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span>
                            <i class="fas fa-user"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAccount">
                        <img class="profile-pic-bubble"
                            src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg"
                            alt="John Doe">
                        <h5 class="dropdown-header">John Doe</h5>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/pages/profile.php">My Account</a>
                        <a class="dropdown-item" href="#">My Order</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sign Out</a>
                    </div>
                </div>
                <?php }else{?>
                <a class="nav-link" href="../pages/sign_in.php">Sign In</a>
                <a class="nav-link" href="../pages/sign_in.php">Sign Up</a>
                <?php } ?>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarBotSupportedContent">
                <ul class="navbar-nav nav-fill w-100">
                    <li class="nav-item ">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link ml-auto"  role="button" >
                                Designs
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Machines
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Inks
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Needles and Cartridges
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Grips Tips and Tubes
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Studio Furniture
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link "  role="button" >
                                Aftercare
                            </a>
                            <div class="subclass-nav-mobile ">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item align-middle">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Medical Equipment
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                        <a class="btn btn-secondary secondary-nav-link"  role="button" >
                                Piercings
                            </a>
                            <div class="subclass-nav-mobile">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
    </nav>
    <nav id="searchMobile">
    <div class="input-group" id="search-mobile">
        <input type="text" class="form-control" placeholder="Search" aria-describedby="search-button">
        <div class="input-group-append">
            <button class="btn btn-outline-success" type="button" id="search-button">
                <a href="/pages/search.php">
                    <i class="fas fa-search"></i>
                </a>
            </button>
        </div>
    </div>
    </nav>

    <?php } 

function draw_secondary_navbar(){ ?>

    <nav id="secondary-navbar" class="navbar navbar-expand-lg navbar-custom-bot ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBotSupportedContent"
                aria-controls="navbarBotSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars  pt-1"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarBotSupportedContent">
                <ul class="navbar-nav nav-fill w-100">
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Designs
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Machines
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Inks
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Needles and Cartridges
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                               Grips Tips and Tubes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Studio Furniture
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Aftercare
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Medical Equipment
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies ">
                            <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Piercings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php }

/**
 * Function to draw website footer
 */
function draw_footer(){?>
    <footer class="mt-2">
        <div class="container-expanded border-top  py-2">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 border-right">
                    <ul class="list-inline">
                        <p class="text-uppercase font-weight-light"> Information</p>
                        <li>
                            <a href="../pages/about_us.php"
                                class="list-inline-item font-weight-normal  text-dark ">About us</a>
                        </li>
                        <li>
                            <a href="../pages/faq.php" class="list-inline-item font-weight-normal text-dark ">FAQ</a>
                        </li>
                        <li>
                            <a href="../pages/payments_and_shipment.php"
                                class="list-inline-item font-weight-normal text-dark ">Payments and Shipment</a>
                        </li>
                        <li>
                            <a href="../pages/returns_and_replacements.php"
                                class="list-inline-item font-weight-normal text-dark ">Returns and Replacements</a>
                        </li>
                        <li>
                            <a href="../pages/warranty.php"
                                class="list-inline-item font-weight-normal text-dark ">Warranty</a>
                        </li>
                        <br>
                        <li id="copyright-desktop"> Copyright © ArtifactInk 2020
                        <li>

                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-inline">
                        <p class="text-uppercase"> CONTACTS </p>
                        <li>
                            <a href="#" class="list-inline-item font-weight-bold text-dark">Store 1</a>
                        </li>
                        <li> Lorem ipsum dolor sit amet.</li>
                        <li> Lorem ipsum dolor sit amet.</li>
                        <li> Lorem ipsum dolor sit amet.
                        <li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="container-expanded">
                        <div class="row py-1">

                        </div>
                        <div class="row justify-content-start">
                            <div class="social-network-bubble">
                                <a href="../pages/home.php">
                                    <i class="fab fa-facebook-f fa-2x circle-icon"></i>
                                </a>
                            </div>
                            <div class="social-network-bubble">
                                <a href="../pages/home.php">
                                    <i class="fab fa-instagram fa-2x circle-icon"></i>
                                </a>
                            </div>
                            <div class="social-network-bubble">
                                <a href="../pages/home.php">
                                    <i class="fa fa-twitter fa-2x circle-icon"> </i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <form>
                                    <div class="form-group">
                                        <label for="newsletter_email" class="col-form-label-sm ">Subscribe to our
                                            Newsletter</label>

                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control-sm" id="newsletter_email"
                                                aria-describedby="emailHelp" aria-describedby="button-newsletter">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-sm text" type="button"
                                                    id="button-nwesletter">Subscribe</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p id="copyright-mobile"> Copyright © ArtifactInk 2020 </p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </footer>
    </div>
</body>

</html>
<?php }

?>