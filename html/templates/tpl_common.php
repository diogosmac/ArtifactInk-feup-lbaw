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
            <!-- bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="../fonts/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="../css/custom.css">
        </head>
        <body>

<?php } 

function draw_navbar(){ ?>
   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../pages/home.php">
            <img class="img-fluid" src="../images/logo.jpg" alt="ArtifactInk" height="auto" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home &#xf39e;<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
<?php }

/**
 * Funtion to draw website footer
 */
function draw_footer(){?>
            </body>
        <footer class="fixed-bottom">
            <div class="container-expanded border-top  py-2">
                <div class="row">
                    <div class="col-sm-2"></div>
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
                        </ul> 
                    </div>
                    <div class="col-sm-2"> 
                        <ul class="list-inline"> <p class="text-uppercase"> CONTACTS </p> 
                            <li>
                                <a href="#" class="list-inline-item font-weight-normal text-dark">Store 1</a>
                            </li>
                            <li> Lorem ipsum dolor sit amet.</li>
                            <li> Lorem ipsum dolor sit amet.</li>
                            <li> Lorem ipsum dolor sit amet.</li>     
                        </ul> 
                    </div>
                    <div class="col-sm-2"> 
                        <div class="container-expanded">
                            <div class="row py-2">

                            </div>
                            <div class="row ">
                                <div class="col-sm-2">
                                    <a href="../pages/home.php">
                                        <i class="fab fa-facebook-f fa-2x circle-icon"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <a href="../pages/home.php">
                                    <i class="fab fa-instagram fa-2x circle-icon"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <a href="../pages/home.php">
                                        <i class="fa fa-twitter fa-2x circle-icon"> </i>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                Subscribe newsletter
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2" >

                    </div>
                </div>
                <p class="mx-auto" style="width: 300px;"> Copyright © 2019 LTW FEUP</p> 
            </div>

        </footer>   
    </html> 
<?php }

?>