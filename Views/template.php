<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="git puUTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cook And Burn</title>
    <meta name="description" content="Cook and burn est un site de partage de recette " />
    <meta name="keywords" content="html template, css, barbecue, viande, steack, chaleur, saucisse, sauce, grillade, griller, grille, poèle, poale,  web design" />
    <meta name="author" content="IUT d'Aix en provence" />
    <!-- Favicons (created with http://realfavicongenerator.net/)-->
    <link rel="apple-touch-icon" sizes="60x60" href="http://tristan-info.alwaysdata.net/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="60x60" href="http://tristan-info.alwaysdata.net/img/favicons/apple-touch-icon-60x60.png">
    <link rel="icon" type="image/png" href="http://tristan-info.alwaysdata.net/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="http://tristan-info.alwaysdata.net/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="http://tristan-info.alwaysdata.net/img/favicons/manifest.json">
    <link rel="shortcut icon" href="http://tristan-info.alwaysdata.net/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#00a8ff">
    <meta name="msapplication-config" content="http://tristan-info.alwaysdata.net/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <!-- Normalize -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/css/normalize.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/css/bootstrap.css">
    <!-- Owl -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/css/owl.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/css/animate.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/fonts/eleganticons/et-icons.css">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/css/cardio.css">
    <!-- ADD style -->
    <link rel="stylesheet" type="text/css" href="http://tristan-info.alwaysdata.net/css/more.css">
    <style>
         .search-container {
            float: right;
        }

         input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

         .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

         .search-container button:hover {
            background: #ccc;
        }

         .page {
             display: none;
         }
         .page-active {
             display: block;
         }

    </style>
</head>

<body>
<div class="preloader">
    <img src="http://tristan-info.alwaysdata.net/img/loader.gif" alt="Preloader image">
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
            <a class="navbar-brand" href="/"><img src="http://tristan-info.alwaysdata.net/img/logo.png" data-active-url="http://tristan-info.alwaysdata.net/img/logo-active.png" alt=""></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li class="search-container">
                    <form action="/Recherche/recherche" method="post">
                        <input type="text" placeholder="Recherche.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <?php
                if (isset($_SESSION['grade']) and $_SESSION['grade']>=100)
                {
                    echo '<li><a href="/Gestion"  class="btn btn-blue">Panel Admin</a></li>';
                }

                if (isset($_SESSION['grade']))
                {
                    echo '<li><a href="/MesRecettes" >Mes Recettes</a></li>';
                    echo '<li><a href="/MesFavoris"  >Mes Favoris</a></li>';
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
            <h3 class="white">Connexion</h3>
            <form action="/FormConnection" class="popup-form" method="post">
                <input type="text" class="form-control form-white" name="idForm" placeholder="Identifiant"
                       required maxlength="32">
                <input type="password" class="form-control form-white" name="mdpForm" placeholder="Mots de Passe"
                       required maxlength="32">
                <p class="white">Votre identifiant et mot de passe ne doivent pas dépasser 32 caractères</p>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="None" id="squaredOne" name="" />
                        <a herf="#" >Mots de passe perdu</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">Connexion</button>
            </form>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center-mobile">
                <h3 class="white">Acheter un barbecue dès maintenant</h3>
                <h5 class="light regular light-white">Pour des recettes plus folles</h5>
                <a href="#" class="btn btn-blue ripple trial-button">Acheter dès maintenant</a>
            </div>
            <div class="col-sm-6 text-center-mobile">
                <h3 class="white">Livraison rapide <span class="open-blink"></span></h3>
                <div class="row opening-hours">
                    <div class="col-sm-6 text-center-mobile">
                        <h5 class="light-white light">France métropolitaine</h5>
                        <h3 class="regular white">3 à 9 jours</h3>
                    </div>
                    <div class="col-sm-6 text-center-mobile">
                        <h5 class="light-white light">Autres</h5>
                        <h3 class="regular white">1 à 3 semaines</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bottom-footer text-center-mobile">
            <div class="col-sm-8">
                <p>&copy; 2018 TOUS DROITS RÉSERVÉS. Powered by TRISTANLEPLUSBEAU</p>
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
<script src="http://tristan-info.alwaysdata.net/js/jquery-1.11.1.min.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/owl.carousel.min.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/bootstrap.min.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/wow.min.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/typewriter.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/jquery.onepagenav.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/main.js"></script>
<script src="http://tristan-info.alwaysdata.net/js/modif.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>

</body>

</html>
