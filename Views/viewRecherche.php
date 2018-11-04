<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 22/10/18
 * Time: 14:38
 */
//echo '<pre>';
//var_dump($data[1]);
//
?>
<div class="likeFooter">
    <br/>
</div>
<div class="container">
    <?php
    echo '<h3>Nous avons trouvée '.count($data['name']).' recettes qui corresponde au mot "'.$data['mot'].'" dans leur titre</h3>';
    foreach ($data['name'] as $row)
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
                <?php
                if ($row['statut']=='public')
                {
                    echo '<img src="../img/icons/tick.png" alt="public" class="avatar"  style="width: 150px"/>';
                }
                elseif ($row['statut']=='privee')
                {
                    echo '<img src="../img/icons/lock.png" alt="privée" class="avatar"  style="width: 150px"/>';
                }
                elseif ($row['statut']=='brouillon')
                {
                    echo '<img src="../img/icons/plus-blue.png" alt="brouillon" class="avatar" style="width: 150px"/>';
                }
                ?>

                <div class="title">
                    <h4><?php echo $row['name'];?></h4>
                    <h5 class="muted regular"><?php echo $row['desCourte'];?></h5>
                </div>
                <a href="/Recette/recette/<?php echo $row['id'];?>" class="btn btn-blue-fill ripple">Voir la recette</a>
            </div>
        </div>

        <?php

    }
    ?>

</div>
<div class="container">
    <?php
    echo '<h3>Nous avons trouvée '.count($data['desc']).' recettes qui corresponde au mot "'.$data['mot'].'" dans leur description</h3>';
    foreach ($data['desc'] as $row)
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
                <?php
                if ($row['statut']=='public')
                {
                    echo '<img src="../img/icons/tick.png" alt="public" class="avatar"  style="width: 150px"/>';
                }
                elseif ($row['statut']=='privee')
                {
                    echo '<img src="../img/icons/lock.png" alt="privée" class="avatar"  style="width: 150px"/>';
                }
                elseif ($row['statut']=='brouillon')
                {
                    echo '<img src="../img/icons/plus-blue.png" alt="brouillon" class="avatar" style="width: 150px"/>';
                }
                ?>

                <div class="title">
                    <h4><?php echo $row['name'];?></h4>
                    <h5 class="muted regular"><?php echo $row['desCourte'];?></h5>
                </div>
                <a href="/Recette/recette/<?php echo $row['id'];?>" class="btn btn-blue-fill ripple">Voir la recette</a>
            </div>
        </div>

        <?php

    }
    ?>

</div>
<div class="container">
    <?php
    echo '<h3>Nous avons trouvée '.count($data['etape']).' recettes qui corresponde au mot "'.$data['mot'].'" dans leurs etapes</h3>';
    foreach ($data['etape'] as $row)
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
                <?php
                if ($row['statut']=='public')
                {
                    echo '<img src="../img/icons/tick.png" alt="public" class="avatar"  style="width: 150px"/>';
                }
                elseif ($row['statut']=='privee')
                {
                    echo '<img src="../img/icons/lock.png" alt="privée" class="avatar"  style="width: 150px"/>';
                }
                elseif ($row['statut']=='brouillon')
                {
                    echo '<img src="../img/icons/plus-blue.png" alt="brouillon" class="avatar" style="width: 150px"/>';
                }
                ?>

                <div class="title">
                    <h4><?php echo $row['name'];?></h4>
                    <h5 class="muted regular"><?php echo $row['desCourte'];?></h5>
                </div>
                <a href="/Recette/recette/<?php echo $row['id'];?>" class="btn btn-blue-fill ripple">Voir la recette</a>
            </div>
        </div>

        <?php

    }
    ?>

</div>