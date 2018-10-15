<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cardio: Free One Page Template by Luka Cvetinovic</title>
    <meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
    <meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
    <meta name="author" content="Luka Cvetinovic for Codrops" />
    <!-- Favicons (created with http://realfavicongenerator.net/)-->
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <link rel="shortcut icon" href="img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#00a8ff">
    <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Normalize -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Owl -->
    <link rel="stylesheet" type="text/css" href="css/owl.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="css/cardio.css">
    <!-- ADD style -->
    <link rel="stylesheet" type="text/css" href="css/more.css">
</head>

<body>
<div class="preloader">
    <img src="img/loader.gif" alt="Preloader image">
</div>
<nav class="navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li><a href="/Recette">Recette</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <?php
                if (isset($_SESSION['grade']))
                {
                    echo '<li><a href="/Utilisateur">Utilisateur</a></li>';
                    echo '<li><a href="/Deconnection"  class="btn btn-blue">Déconnection</a></li>';
                }
                else {
                    echo '<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Connection</a></li>';
                }

                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<!-- special -->

<?php
echo $content;

?>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <h3 class="white">Connection</h3>
            <form action="/FormConnection" class="popup-form" method="post">
                <input type="text" class="form-control form-white" name="idForm" placeholder="Identifiant">
                <input type="password" class="form-control form-white" name="mdpForm" placeholder="Mots de Passe">
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="None" id="squaredOne" name="" />
                        <label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">Connection</button>
            </form>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center-mobile">
                <h3 class="white">Reserve a Free Trial Class!</h3>
                <h5 class="light regular light-white">Shape your body and improve your health.</h5>
                <a href="#" class="btn btn-blue ripple trial-button">Start Free Trial</a>
            </div>
            <div class="col-sm-6 text-center-mobile">
                <h3 class="white">Opening Hours <span class="open-blink"></span></h3>
                <div class="row opening-hours">
                    <div class="col-sm-6 text-center-mobile">
                        <h5 class="light-white light">Mon - Fri</h5>
                        <h3 class="regular white">9:00 - 22:00</h3>
                    </div>
                    <div class="col-sm-6 text-center-mobile">
                        <h5 class="light-white light">Sat - Sun</h5>
                        <h3 class="regular white">10:00 - 18:00</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bottom-footer text-center-mobile">
            <div class="col-sm-8">
                <p>&copy; 2018 TOUS DROITS RÉSERVÉS. Powered by <a href="http://www.phir.co/">PHIr</a> exclusively for <a href="http://tympanus.net/codrops/">Codrops</a></p>
            </div>
            <div class="col-sm-4 text-right text-center-mobile">
                <ul class="social-footer">
                    <li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Holder for mobile navigation -->
<div class="mobile-nav">
    <ul>
    </ul>
    <a href="#" class="close-link"><i class="arrow_up"></i></a>
</div>
<!-- Scripts -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/typewriter.js"></script>
<script src="js/jquery.onepagenav.js"></script>
<script src="js/main.js"></script>
<script src="js/modif.js"></script>

</body>

</html>
