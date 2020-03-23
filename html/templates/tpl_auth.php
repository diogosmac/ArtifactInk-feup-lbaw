<?php 
/**
 * function to draw sign in form a
 */

function draw_auth_header(){ ?>

    <!DOCTYPE html>
    <html lang="en-US">
        <head>
            <title>Artifact Ink</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="UTF-8">

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
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="../fonts/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
            <link rel="stylesheet" type="text/css" href="../css/common.css">
            <link rel="stylesheet" type="text/css" href="../css/sign_in.css">

            <script src="../script/product_card.js" defer></script>
        </head>
        <body>

<?php } 

function draw_sign_in(){ ?>
    <body>
        <div class="container">
            <div class="row">
                <form class="form-signin">
                <a href="../pages/home.php">
                    <img class="mb-4" src="../images/artifact_ink_letters_white.png" alt="ArtifactInk" width="300">
                </a>
                    <div class="sign-box"> 
                        <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
                        <div class="form-group email-input">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group password-input">
                            <label for="exampleInputPassword1">Password</label>
                            <a href="../pages/recover_password.php"> Forget your password?</a>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <button class="btn btn-lg button btn-block" type="submit">Sign in</button>
                        <p class="sign-divider"> or Sign In with </p>
                        <div class="btn-group sign-in-api d-flex justify-content-center" data-toggle="buttons">
                            <label class="btn">
                                <a class="btn" href="#"> 
                                    <i class="fab fa-google"></i>
                                    Google
                                </a>
                            </label>
                            <label class="btn ">
                                <a class="btn" href="#">
                                    <i class="fab fa-facebook-square"></i> 
                                    Facebook
                                </a>
                            </label>
                        </div>
                    </div>
                </form>  
                <div class="row new-user justify-content-center">
                    <h6>Don't have an account yet?</h6>
                        <a class="btn btn-lg button btn-block" href="../pages/sign_up.php">Sign Up</a>
                    <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
                </div>
            </div>
        </div>
    </body>
<?php } 

function draw_sign_up(){ ?>
      <body>
        <div class="container">
            <div class="row">
                <form class="form-signin ">
                <a href="../pages/home.php">
                    <img class="mb-4" src="../images/artifact_ink_letters_white.png" alt="ArtifactInk" width="300">
                </a>
                    <div class="sign-box"> 
                        <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
                        <div class="form-group input">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group email-input">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group password-input">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group password-input">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2">
                        </div>
                       
                        <button class="btn btn-lg button btn-block" type="submit">Sign Up</button>
                        <p class="sign-divider"> or Sign In with </p>
                        <div class="btn-group sign-in-api d-flex justify-content-center" data-toggle="buttons">
                            <label class="btn">
                                <a class="btn" href="#"> 
                                    <i class="fab fa-google"></i>
                                    Google
                                </a>
                            </label>
                            <label class="btn ">
                                <a class="btn" href="#">
                                    <i class="fab fa-facebook-square"></i> 
                                    Facebook
                                </a>
                            </label>
                        </div>
                    </div>
                </form>  
                <div class="row new-user justify-content-center">
                    <h6>Already have an account?</h6>
                        <a class="btn btn-lg button btn-block" href="../pages/sign_in.php">Sign In</a>
                    <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
                </div>
            </div>
        </div>
    </body>
<?php } 

function draw_recover_password(){ ?>
    <body>
        <div class="container">
            <div class="row">
                <form class="form-signin ">
                <a href="../pages/home.php">
                    <img class="mb-4" src="../images/artifact_ink_letters_white.png" alt="ArtifactInk" width="300">
                </a>
                    <div class="sign-box"> 
                        <h1 class="h3 mb-3 font-weight-normal">Recover Password</h1>
                        <div class="form-group email-input">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button id="recover-button" class="btn btn-lg button btn-block" type="submit">Recover</button>
                            <a id="recover-back" href="../pages/sign_in.php"> Back</a>
                        </div>
                        
                    </div>
                </form>  
                <div class="row new-user justify-content-center">
                    <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
                </div>
            </div>
        </div>
    </body>
<?php } ?>