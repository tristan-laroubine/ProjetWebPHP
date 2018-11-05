<?php


session_start();
$this->_t = 'Cook And Burn';
$user = $data;
?>

<div class="likeFooter">
    <br/>
</div>

<section id="services" class="section section-padded">
    <div class="container">
        <div class="row text-center title">
            <h2>Services</h2>
            <h4 class="light muted">Gestion des différentres données de l'utilisateur !</h4>
            <?php
            if(isset($_SESSION['erreur']))
            {
                echo'<h3 style="color: red;">'. $_SESSION['erreur'].'</h3>';
                unset($_SESSION['erreur']);
            }
            ?>
        </div>
        <div class="row services">
            <div class="col-md-4">
                <div class="service">
                    <div class="icon-holder">
                        <img src="img/icons/heart-blue.png" alt="" class="icon">
                    </div>
                    <h4 class="heading">Mes informations personnel</h4>
                    <p class="description">
                        Identifiant : <span style="font-weight: bold"><?php echo $user['name'] ?></span><br/>
                        Mots de passe : <span style="font-weight: bold">***************<br/></span>
                        Email : <span style="font-weight: bold"><?php echo $user['email'] ?><br/></span>
                        Adresse mail de récupération : <span style="font-weight: bold"> <?php echo $user['recup'] ?></span><br/>

                        <a href="#" data-toggle="modal" data-target="#modifUser" class="btn btn-blue">Modifier</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <div class="icon-holder">
                        <img src="img/icons/heart-blue.png" alt="" class="icon">
                </div>
                    <h4 class="heading">Mes recettes</h4>
                    <p class="description"> <a href="/MesRecettes" class="btn btn-blue">Voir mes recettes</a> </p>
                    <p class="description"> <a href="/NouvelleRecette" class="btn btn-blue">Ajouter une recette</a> </p>
                </div>

            </div>
            <div class="col-md-4">
                <div class="service">
                    <div class="icon-holder">
                        <img src="img/icons/heart-blue.png" alt="" class="icon">
                    </div>
                    <h4 class="heading">Mes favoris</h4>
                    <p class="description"> <a href="/MesFavoris" class="btn btn-blue">Voir mes favoris</a> </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ModifUser POP UP Form -->
    <div class="modal fade" id="modifUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <h3 class="white">Modifier mes informations</h3>
                <a href="#" data-toggle="modal" data-target="#modifName" class="btn btn-blue">Modifier mon identifiant</a><br/>
                <a href="#" data-toggle="modal" data-target="#modifMDP" class="btn btn-blue">Modifier mon mots de passe</a><br/>
                <a href="#" data-toggle="modal" data-target="#modifEmail" class="btn btn-blue">Modifier mon adresse mail</a><br/>
                <a href="#" data-toggle="modal" data-target="#RecupUser" class="btn btn-blue">Modifier mon adresse mail de récupération</a><br/>
            </div>
        </div>
    </div>
    <!-- /ModifUser POP UP Form/-->
    <!-- Modifier mon identitifant -->
    <div class="modal fade" id="modifName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <h3 class="white">Identifiant</h3>
                <form action="/FormUtilisateur" class="popup-form" method="post">
                    <input type="text" class="form-control form-white" name="nameForm" value="<?php echo $user['name'] ?>">
                    <button type="submit" name="modifName" value="yes" class="btn btn-submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modifier mon identifiant/ -->
    <!-- Modifier mon mots de passe -->
    <div class="modal fade" id="modifMDP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">

                <h3 class="white">Mots de passe</h3>
                <form action="/FormUtilisateur" class="popup-form" method="post">
                    <input type="password" class="form-control form-white" name="mdpForm" placeholder="***********">
                    <button type="submit" name="modifMDP" value="yes" class="btn btn-submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modifier mon mots de passe/ -->
    <!-- Modifier mon adresse mail -->
    <div class="modal fade" id="modifEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">

                <h3 class="white">Adresse mail</h3>
                <form action="/FormUtilisateur" class="popup-form" method="post">
                    <input type="email" class="form-control form-white" name="emailForm" value="<?php echo $user['email'] ?>">
                    <button type="submit"  name="modifEmail" value="yes" class="btn btn-submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modifier mon adresse mail / -->
    <!-- Modifier mon adresse mail de récupération -->
    <div class="modal fade" id="RecupUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">

                <h3 class="white">Mail de récupération</h3>
                <form action="/FormUtilisateur" class="popup-form" method="post">
                    <input type="email"  name="recupForm" class="form-control form-white" value="<?php echo $user['recup'] ?>">
                    <button type="submit"  name="modifRecup" value="yes" class="btn btn-submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modifier mon adresse mail de récupération / -->
    <div class="cut cut-bottom"></div>
</section>
