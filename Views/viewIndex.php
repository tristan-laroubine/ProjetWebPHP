

<?php
//$this->_t = 'Cook And Burn';
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

$arrayRecette=$data[1];
$resultFirst=$arrayRecette[0];

echo '
<section id="team" class="section gray-bg" style="align-items: center">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Recette à la Une</h2>
				<h4 class="light muted">La dernière recette ayant dépassé les 15 burns !</h4>
			</div>
<div class="row">
					<div class="team text-center">
						<div class="cover" style="background:url(\'/src/img/recette(1).jpg\'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">'.$resultFirst['burns'] .' Burns</h3>
								<h5 class="light light-white">Difficulté : '. $resultFirst['difficulte'].'/10</h5>
							</div>
						</div>
						<img src="/src/img/logoRecette.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>'.$resultFirst['name'].'</h4>
							<h5 class="muted regular">'.$resultFirst['desCourte'].'</h5>
						</div>
						<a href="/Recette/recette/'.$resultFirst['id'].'"><button class="btn btn-blue-fill">Voir la recette</button></a>
					</div>
             </div>
          
</div>
</section>

';

?>

