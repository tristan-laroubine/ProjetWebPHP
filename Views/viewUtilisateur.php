<?php
$this->_t = 'Cook And Burn';
$id=17;
$name='Tristan LAROUBINE';
$grade=999;
$email='tristan.LAROUBINE@etu.univ-amu.fr';
require_once 'Modeles/GestionUser.php';
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
                    <p class="description"><?php echo 'coucou' ?></p>
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
    <div class="cut cut-bottom"></div>
</section>