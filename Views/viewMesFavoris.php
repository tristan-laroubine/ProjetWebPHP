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
    foreach ($data as $row)
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