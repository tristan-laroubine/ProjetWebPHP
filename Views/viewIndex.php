<?php
$this->_t = 'Cook And Burn';
session_start();
echo '
<header id="intro">
    <div class="container">
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="light white">COOK & BURN !</h3>
                        <h1 class="white typed">COOK & BURN, site de partage de recette</h1>
                        <span class="typed-cursor">|</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
';
if (isset($_SESSION['id']))
{
    echo '<h1>BONJOUR !</h1>';
    echo $_SESSION['id'];
    echo 'oui';
    echo $_SESSION['grade'];
}else{
    echo '<h6>NTM no connect </h6>';
}
