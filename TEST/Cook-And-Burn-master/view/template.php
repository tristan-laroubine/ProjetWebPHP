<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
include ('./controler/ControllerConnexionAction.php');?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $t; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tasty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
    <!--// css -->
    <!-- font-awesome icons -->
    <link href="./css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- font -->
    <link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- //font -->
    <script src="./js/jquery-1.11.1.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/SmoothScroll.min.js"></script>
</head>
<body>
<script src="./js/jquery.vide.min.js"></script>
<div style="background: url('../view/video/cook.jpg') bottom fixed; background-size : 100%;">
    <!-- banner -->

    <div class="banner">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <h1><a href="index">Cook And Burn</a></h1>
                </div>
            <?php
            if(isset($_SESSION['pseudo']))
            {?>
                <div class="top-nav">
                    <nav class="navbar navbar-default">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a class="<?php if($t == "Cook And Burn") echo "active";?>" href="index">Accueil</a></li>
                                <li><a class="<?php if($t == "Profil") echo "active";?>" href="profil">Mon profil</a></li>
                                <li><a class="<?php if($t == "Création recette") echo "active";?>"href="creationRecette">Créer une recette</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </nav>
                </div>
            <?php
            }
            else
            {
            ?>
                <div class="top-nav">
                    <nav class="navbar navbar-default">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a class="<?php if($t == "Cook And Burn") echo "active";?>" href="index">Accueil</a></li>
                                <li><a class="<?php if($t == "Inscription") echo "active";?>" href="SignUp">Inscription</a></li>
                                <li><a class="<?php if($t == "Connexion") echo "active";?>" href="Connexion">Connexion</a></li>
                                <li><a href="news.html">News & Events</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </nav>
                </div>
            <?php
            }
            ?>
                <div class="clearfix"> </div>



    <!-- //banner -->
</div>
<!-- special -->
<?php echo $content; ?>
<!-- //special -->


<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="footer-heading">
                <h3>Get in touch with us</h3>
            </div>
            <div class="footer-icons">
                <ul>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a><span>Twitter</span></li>
                    <li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a><span>Facebook</span></li>
                    <li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a><span>Google +</span></li>
                    <li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a><span>Dribbble</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="w3agile-list">
            <ul>
                <li><a href="about.html">About</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="codes.html">Codes</a></li>
                <li><a href="news.html">News & Events</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="agileinfo">
            <p>© 2016 Tasty . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</div>
<!-- //copyright -->
</body>
</html>
