<!DOCTYPE html>
<?php

include 'bdd.php';


if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = /*sha1*/($_POST['mdp']);
   $mdp2 = /*sha1*/($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?) ");
                     $insertmbr->execute(array($pseudo, $mail , $mdp));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }

?>

<html>
<head>
<title>Tasty a Hotels and Restaurants Category Flat Bootstrap responsive Website Template | About :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tasty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- parallax -->
<script src="js/SmoothScroll.min.js"></script>
<script src="js/jarallax.js"></script>
<!-- //parallax -->
</head>
<body>
	<div class="bg-img">
		<!-- banner -->
		<div class="banner code-banner">
			<div class="container">
				<div class="header">
					<div class="logo">
						<h1><a href="index.html">Tasty</a></h1>
					</div>
					<div class="top-nav">
						<nav class="navbar navbar-default">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
								</button>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li><a href="index.php">Accueil</a></li>
									<li><a class="active" href="inscription.php">Inscription</a></li>
									<li><a href="menu.php">Connexion</a></li>
									<li><a href="codes.php">Recettes</a></li>	
									<li><a href="news.php">News & Events</a></li>
									<li><a href="contact.php">Contact</a></li>
									<div class="clearfix"> </div>
								</ul>	
							</div>	
						</nav>		
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //banner -->
	</div>
	<!-- about -->
	<div class="about">
		<div class="container">
			<div class="about-heading">
				<h2>On vous inscrivant :</h2>
			</div>
			<div class="about-grids">
				<div class="col-md-5 wthree-about-left">
					<div class="wthree-about-left-info">
						<img src="images/n2.jpg" alt="" />
					</div>
				</div>
				<div class="col-md-7 agileits-about-right">
					<h5>Rédigez , mettez en favori toutes les recettes que vous souhaitez blablablablablabalbalablabala
					test
					test</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- offers -->
	<div class="jarallax offers">
		<div class="container">
			<div class="offers-heading">
				<h3>Inscription</h3>
			</div>
			<div class="offers-grids">
				<form method="POST" action="">
					<div class="col-md-6 wthree-offers-left">
						<div class="offers-left-heading">
							<h4>Remplissez le formulaire en entier :</h4>
						</div>
						<div class="offers-left-grids">
							<div class="offers-number">
								<p>1</p>
							</div>
							<div class="offers-text">
								<p>Pseudo : </p>
								<input type="text" placeholder="Votre Pseudo" id="pseudo" name="pseudo" value="">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="offers-left-grids offers-left-middle">
							<div class="offers-number">
								<p>2</p>
							</div>
							<div class="offers-text">
								<p>Email :</p>
								<input type="email" placeholder="Votre mail" id="mail" name="mail" value="">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="offers-left-grids">
							<div class="offers-number">
								<p>3</p>
							</div>
							<div class="offers-text">
								<p>Confirmation email :</p>
								<input type="email" placeholder="Votre mail" id="mail2" name="mail2" value="">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-6 wthree-offers-right">
						<div class="offers-right-grids">
							<div class="offers-number">
								<p>4</p>
							</div>
							<div class="offers-text">
								<p>Mot de passe : </p>
								<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="offers-right-grids offers-left-middle">
							<div class="offers-number">
								<p>2</p>
							</div>
							<div class="offers-text">
								<p>Mot de passe à nouveau : </p>
								<input type="password" placeholder="Votre mot de passe" id="mdp2" name="mdp2">
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" class="button" name="forminscription" value="Je m'inscris ! ">
				</form>
				<?php
					if(isset($erreur))
				 	echo '<font color="red">'.$erreur."</font>";
				?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        /* init Jarallax */
        $('.jarallax').jarallax({
            speed: 0.5,
            imgWidth: 1366,
            imgHeight: 768
        })
    </script>
	<!-- offers -->

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="footer-heading">
					<h3>Suivez nous sur les réseaux !</h3>
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