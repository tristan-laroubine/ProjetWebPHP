

<?php
$pagination = (int)$data[4]['paginationIndex'];
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
?>
<br/>
<br/>
<br/>
<div class="container" ><p> Nous avons réalisé un site web de partage de recettes de barbecue pour l'entreprise Cook & Burn. Il possède plusieurs
    fonctionnalités :
    - Pour un visiteur ne possédant pas de compte sur le site, il peut voir la recette à la une étant celle ayant obtenu
    15 Burns (equivalent de likes) le plus récemment ainsi que naviguer sur la page d'accueil.
    - Un utlisateur ayant un compte peut quant à lui se connecter au site et si jamais il a oublié on mot de passe en
    demander un nouveau via un système de mot de passe oublié lui envoyant un mail contenant son nouveau mot de passe.
    Une fois connecté, l'utilisateur peut accéder à son profil sur lequel il peut accéder à ses informations
    personnelles fournies lors de la création de son compte qu'il peut modifier. Il peut aussi accéder aux recettes
    qu'il a créées pour les modifer voire les supprimer ou en créer de nouvelles qui peuvent être publiques privées ou
    brouillon. Enfin un utilisateur peut accéder aux recettes des autres utilisateurs qu'il peut ajouter à ses favoris
    et ainsi la retrouver plus facilement dans son profil via un onglet mes favoris.</p></div>
<?php
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
						<div class="cover" style="background:url(\'/img/recette.png\'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">'.$resultFirst['burns'] .' Burns</h3>
								<h5 class="light light-white">Difficulté : '. $resultFirst['difficulte'].'/10</h5>
							</div>
						</div>
						<img src="/img/logo.png" alt="Team Image" class="avatar">
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
<div class="container">
    <?php
    $nbOfPage = 1;
    $compt = 0;
    while ($compt < count($data[3])){
        echo '<span id="page' . $nbOfPage . '" style="display:none;" >';
        $tempData =[];
    for($i = 0; $i < $pagination; ++$i) {
        $tempData[$i] = $data[3][$compt];
        $tempData[$i] = $data[3][$compt + $i];
    }
    foreach ($tempData as $row) {
        if (isset($row['name']))
        {

        ?>
        <div class="col-md-4">
            <div class="team text-center">
                <div class="cover" style="background:url('/img/recette.png'); background-size:cover;">
                    <div class="overlay text-center">
                        <h3 class="white"> <?php echo $row['burns'];?> Burns</h3>
                        <h5 class="white">Difficulté : <?php echo $row['difficulte'];?> / 10</h5>
                    </div>
                </div>
                <div class="title">
                    <h4><?php echo $row['name'];?></h4>
                    <h5 class="muted regular"><?php echo $row['desCourte'];?></h5>
                </div>
                <a href="/Recette/recette/<?php echo $row['id'];?>" class="btn btn-blue-fill ripple">Voir la recette</a>
            </div>
        </div>
        <?php

        }
    }
    echo '</span>';
        ?>

 
        <?php
        ++$nbOfPage;
        $compt = $compt + $pagination ;
    }
    echo '</div><div class="container">';
    echo '        <span>
  <ul class="pagination">
                 <li class="page-item"><button class="page-link" onclick="pagination(\'before\')">-</button></li>'."\n";
    for($i = 1; $i < $nbOfPage; ++$i) {
        echo '                 <li class="page-item"><button class="page-link" onclick="pagination('.$i.')">'.$i.'</button></li>'."\n";
    }
    echo '                 <li class="page-item"><button class="page-link" onclick="pagination(\'after\')">+</button></li>'."\n".'
              </ul>
</span>';
    ?>

</div>
</div>
<script>
    var newElmt = document.getElementById("page"+1);
    newElmt.style.display="block";
    $datapageActive = 1;
    $dataMax = <?php echo $nbOfPage ?>;
    function pagination($page) {
        if ($page == 'before')
        {
            if ( $datapageActive > 1 )
                $page = $datapageActive - 1;
            else
                $page = 1;
        }

        if ($page == 'after')
        {
            if ( $datapageActive < $dataMax-1 )
                $page = $datapageActive + 1;
            else
                $page = 1;
        }
        var elmt = document.getElementById("page"+$datapageActive);
        elmt.style.display="none";
        $datapageActive = $page;
        var newElmt = document.getElementById("page"+$datapageActive);
        newElmt.style.display="block";

    }
</script>
