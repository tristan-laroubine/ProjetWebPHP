<?php
$id = $data['id'];
$name = $data['name'];
$tmpsPrep = $data['tmpsPrep'];
$tmps_cuisson = $data['tmps_cuisson'];
$difficulte = $data['difficulte'];
$burns = $data['burns'];
$status = $data['statut'];
$desCourte = $data['desCourte'];
$desLongue = $data['desLongue'];
$etapes = $data['etapes'];
?>
<div class="recettebody">
    <div class="recettearea">
        <?php
        if ($data['favori']== 'no')
        {
            echo '<a class="favbutton" href="/AddFavoris/recette/'.$id.' ">Ajoutez à mes favoris</a>';
        }
        elseif ($data['favori']== 'yes')
        {
           echo '<a class="favbutton" href="/AddFavoris/delete/'.$id.'">Supprimer des favoris</a>';
        }
        ?>
        <br/>
        <div>
            <center><h1> <?php echo $name ?> </h1>
            <br/>
            <h2><?php echo $desLongue ?></h2>
            <br/>
            <p>Difficultée :</p><?php for ($i = 0; $i < $difficulte; ++$i) {
                echo '<img src="../../img/icons/star.png" style="width: 50px">';
            }
            ?></center>
        </div>
        <br/>


        <img class="imagerecette" src="/src/img/recette(2).jpg">
        <div class="recettestat"><img src="../../img/icons/cook.png" style="width: 50px">
            <p>Temps de préparation : <?php echo $tmpsPrep ?> min</p></div>
        <div class="recettestat">
            <a href="/AddBurns/recette/<?php echo $data['id'];?>">
                <p>Ajouter un Burn ! </p><img src="../../img/icons/burn.png" style="width: 50px">
            </a>
            <p>: <?php echo $burns ?> burns</p></div>
        <div class="recettestat"><img src="../../img/icons/cooktime.png" style="width: 50px">
            <p>Temps de cuisson : <?php echo $tmps_cuisson ?> min</p></div>
        <div class="ingredient">
            <h3>Ingrédients pour 1 personne :</h3>
            <ul class="list-group">
                <?php
                foreach ($data['compose'] as $row)
                {
                    echo '<li class="list-group-item">'.$row['name'].' : '.$row['quantite'].'  '.$row['type_quantite'].'</li>';
                }
                ?>
            </ul>
        </div>
        <div class="etaperecette"><br/>
            <div><h4><?php echo $desCourte ?></h4></div>
            <br/>
            <?php
            $etapeNew = explode("ÉTAPE", $etapes);
            if ($etapeNew[1] == null)
            {
                $etapeNew = explode("Etape", $etapes);
            }
            elseif ($etapeNew == null)
                $etapeNew[1] = explode("ETAPE", $etapes);
            for ($i = 1; $i < sizeof($etapeNew); ++$i) {
                echo '<h3> Etape ', $i, '</h3>';
                echo '<p>', substr($etapeNew[$i], 2), '</p>';
            }
            ?></div>

    </div>
</div>
