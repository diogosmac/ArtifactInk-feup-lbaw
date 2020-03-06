<?php
/**
 * Function to draw website header
 */
function draw_header(){ ?>

    <!DOCTYPE html>
    <html lang="en-US">
        <head>
            <title>Artifact Ink</title>
            <link rel="icon" href="../images/single_logo.svg">
            <meta charset="UTF-8">
            <!-- bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="../fonts/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
            <link rel="stylesheet" type="text/css" href="../css/common.css">
            <link rel="stylesheet" type="text/css" href="../css/footer.css">
            <link rel="stylesheet" type="text/css" href="../css/navbar.css">
        </head>
        <body>

<?php } 

function draw_navbar($session){ ?>
    <div class="fixed-top"> 
        <?php 
            draw_main_navbar($session); 
            draw_secondary_navbar();
        ?>
    </div>
<?php }

function draw_main_navbar($session){ ?> 

    <nav class="navbar navbar-expand-md navbar-custom-top">
        <a class="navbar-brand" href="../pages/home.php">
            <img class="d-inline-block align-top" src="../images/artifact_ink_logo_white.svg" alt="ArtifactInk" height="40" width="50">
            <img class="d-inline-block align-top" src="../images/artifact_ink_letters_white.svg" alt="ArtifactInk" height="40" width="125">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTopSupportedContent" aria-controls="navbarTopSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> 
                <i class="fas fa-bars"></i> 
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTopSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
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
                        <a class="nav-link" href="#">
                            <span> 
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/sign_in.php">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            John Doe
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/sign_in.php">Sign Out</a>
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
<?php } 

function draw_secondary_navbar(){ ?>

   <nav class="navbar navbar-expand-lg navbar-custom-bot " > 
       <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBotSupportedContent" aria-controls="navbarBotSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> 
                    <i class="fas fa-bars"></i> 
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarBotSupportedContent">
                <ul class="navbar-nav nav-fill w-100">
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                    </li >
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                    </li class="nav-item">
                    <li>
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                    </li >
                    <li class="nav-item">
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
                        <div class="dropdown dropdownSupplies">
                            <a class="btn btn-secondary" href="../pages/home.php" role="button"  aria-haspopup="true" aria-expanded="false">
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
            </body>
        <footer class="">
            <div class="container-expanded border-top  py-2">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 border-right"> 
                        <ul class="list-inline"> <p class="text-uppercase font-weight-light"> Information</p> 
                            <li>
                                <a href="#" class="list-inline-item font-weight-normal  text-dark ">About us</a>
                            </li>
                            <li>
                                <a href="#" class="list-inline-item font-weight-normal text-dark ">FAQ</a>
                            </li>
                            <li>
                                <a href="#" class="list-inline-item font-weight-normal text-dark ">Payments and Orders</a>
                            </li>
                            <li>
                                <a href="#" class="list-inline-item font-weight-normal text-dark ">Returns and Replacements</a>
                            </li>
                            <li>
                                <a href="#" class="list-inline-item font-weight-normal text-dark ">Warranty</a>
                            </li>
                            <br>
                            <li> Copyright © ArtifactInk 2020 <li>
                            
                        </ul> 
                    </div>
                    <div class="col-sm-3"> 
                        <ul class="list-inline"> <p class="text-uppercase"> CONTACTS </p> 
                            <li>
                                <a href="#" class="list-inline-item font-weight-bold text-dark">Store 1</a>
                            </li>
                            <li> Lorem ipsum dolor sit amet.</li>
                            <li> Lorem ipsum dolor sit amet.</li>
                            <li> Lorem ipsum dolor sit amet.<li>
                        </ul> 
                    </div>
                    <div class="col-sm-3"> 
                        <div class="container-expanded">
                            <div class="row py-1">

                            </div>
                            <div class="row ">
                                <div class="col-sm-3">
                                    <a href="../pages/home.php">
                                        <i class="fab fa-facebook-f fa-2x circle-icon"></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a href="../pages/home.php">
                                    <i class="fab fa-instagram fa-2x circle-icon"></i>
                                    </a>
                                </div>          
                                <div class="col-sm-3">
                                    <a href="../pages/home.php">
                                        <i class="fa fa-twitter fa-2x circle-icon"> </i>
                                    </a>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="newsletter_email" class="col-form-label-sm ">Subscribe to our Newsletter</label>
                                            
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control-sm" id="newsletter_email" aria-describedby="emailHelp"  aria-describedby="button-newsletter">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary btn-sm text" type="button" id="button-nwesletter">Subscribe</button>
                                                </div>
                                            </div>
                                        </div>   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>   
        </footer>   
    </html> 
<?php }

?>