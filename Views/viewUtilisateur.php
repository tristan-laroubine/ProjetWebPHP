<?php

require_once 'Modeles/GestionUser.php';
session_start();
$this->_t = 'Cook And Burn';
$user = GestionUser::getUserById($_SESSION['id'])
?>
<section id="services" class="section section-padded">
    <div class="container">
        <div class="row text-center title">
            <h2>Services</h2>
            <h4 class="light muted">Achieve the best results with our wide variety of training options!</h4>
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
                    <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <div class="icon-holder">
                        <img src="img/icons/heart-blue.png" alt="" class="icon">
                    </div>
                    <h4 class="heading">Mes favoris</h4>
                    <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ModifUser POP UP Form -->
    <div class="modal fade" id="modifUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <h3 class="white">Modifier mes informations</h3>
                <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Modifier mon identifiant</a>
                <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Modifier mon mots de passe</a>
                <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Modifier mon adresse mail</a>
                <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Modifier mon adresse mail de récupération</a>
            </div>
        </div>
    </div>
    <!-- /ModifUser POP UP Form/-->
    <!-- Modifier mon identitifant -->
    <!-- /Modifier mon identifiant/ -->
    <!-- Modifier mon mots de passe -->
    <!-- /Modifier mon mots de passe/ -->
    <!-- Modifier mon adresse mail -->
    <!-- /Modifier mon adresse mail / -->
    <!-- Modifier mon adresse mail de récupération -->
    <!-- /Modifier mon adresse mail de récupération / -->
    <div class="cut cut-bottom"></div>
</section>