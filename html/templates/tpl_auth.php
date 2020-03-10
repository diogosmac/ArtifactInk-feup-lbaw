<?php 
/**
 * function to draw sign in form a
 */

function draw_auth_header(){ ?>

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
            <link rel="stylesheet" type="text/css" href="../css/sign_in.css">

            <script src="../script/product_card.js" defer></script>
        </head>
        <body>

<?php } 

function draw_sign_in(){ ?>
    <body>
        <div class="container">
            <div class="row">
                <form class="form-signin ">
                <a href="../pages/home.php">
                    <img class="mb-4" src="../images/artifact_ink_letters_white.svg" alt="ArtifactInk" width="300" height="72">
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
                        <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign in</button>
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
                        <a class="btn btn-lg btn-secondary btn-block" href="../pages/sign_up.php">Sign Up</a>
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
                    <img class="mb-4" src="../images/artifact_ink_letters_white.svg" alt="ArtifactInk" width="300" height="72">
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
                       
                        <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign Up</button>
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
                        <a class="btn btn-lg btn-secondary btn-block" href="../pages/sign_.php">Sign In</a>
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
                    <img class="mb-4" src="../images/artifact_ink_letters_white.svg" alt="ArtifactInk" width="300" height="72">
                </a>
                    <div class="sign-box"> 
                        <h1 class="h3 mb-3 font-weight-normal">Recover Password</h1>
                        <div class="form-group email-input">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button id="recover-button" class="btn btn-lg btn-secondary btn-block" type="submit">Recover</button>
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