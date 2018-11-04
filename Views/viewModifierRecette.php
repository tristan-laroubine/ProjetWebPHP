<?php
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
            echo '<a class="favbutton" href="/AddFavoris/recette/'.$id.'">Ajoutez à mes favoris</a>';
        }
        elseif ($data['favori']== 'yes')
        {
            echo '<a class="favbutton" href="/AddFavoris/recette/'.$id.'">Supprimer des favoris</a>';
        }
        ?><div>
            <center><h1 style="display: inline"> <?php echo $name ?> </h1>
                <a href="#" data-toggle="modal" data-target="#modifName" class="btn btn-blue">Modifier</a>
                <br/>
                <h2 style="display: inline">Description longue : <?php echo $desLongue ?></h2>
                <a href="#" data-toggle="modal" data-target="#modifDesLongue" class="btn btn-blue">Modifier</a>
                <br/>
                <h3 style="display: inline">Description courte : <?php echo $desCourte ?></h3>
                <a href="#" data-toggle="modal" data-target="#modifDesCourte" class="btn btn-blue">Modifier</a>
                <br/>
                <p>Difficultée :</p><?php for ($i = 0; $i < $difficulte; ++$i) {
                    echo '<img src="../../img/icons/star.png" style="width: 50px">';
                }
                ?>
                <a href="#" data-toggle="modal" data-target="#modifDifficulte" class="btn btn-blue">Modifier</a>



        <br/>
        <?php
        if ($status=='public')
        {
            echo '<span class="btn btn-success" style="background-color: green;">Public</span>';
        }
        elseif ($status=='privee')
        {
            echo '<span class="btn btn-danger" style="background-color: red;">Privée</span>';
        }
        elseif ($status=='brouillon')
        {
            echo '<span class="btn btn-primary"  style="background-color: blue;">Brouillon</span>';
        }
        ?>
                <a href="#" data-toggle="modal" data-target="#modifStatu" class="btn btn-blue">Modifier</a>
            </center>
        </div>
        <img class="imagerecette" src="/src/img/recette(2).jpg">
        <div class="recettestat"><img src="../../img/icons/cook.png" style="width: 50px">
            <p>Temps de préparation : <?php echo $tmpsPrep ?> min </p><a href="#" data-toggle="modal" data-target="#modifTempsPrep" class="btn btn-blue">Modifier</a></div>
        <div class="recettestat">
            <a href="/AddBurns/recette/<?php echo $data['id'];?>">
                <p>Ajouter un Burn ! </p><img src="../../img/icons/burn.png" style="width: 50px">
            </a>
            <p>: <?php echo $burns ?> burns </p>
        </div>

        <div class="recettestat"><img src="../../img/icons/cooktime.png" style="width: 50px">
            <p>Temps de cuisson : <?php echo $tmps_cuisson ?> min </p> <a href="#" data-toggle="modal" data-target="#modifTempsCuisson" class="btn btn-blue">Modifier</a></div>

        <?php
        if (!empty($data['compose']))
        {
          echo '<div class="ingredient">'.
               '    <h3>Ingrédients pour 1 personne :</h3>'.
                  '      <ul class="list-group">';

                foreach ($data['compose'] as $row)
                {
                    echo '                <li class="list-group-item">'.$row['name'].' : '.$row['quantite'].'  '.$row['type_quantite'].' <a href="/AddIngredient/supprime/'.$row['id'].'/'.$row['id_recette'].'">Supprimé</a></li>';
                }

                echo '        </ul>'.
            '</div>';
        }
        else{
            echo '<h3>Aucun ingredient</h3> ';
        }
        ?>
        <a href="#" data-toggle="modal" data-target="#addIngredient" class="btn btn-blue">Ajoute un Ingrédient</a><br/>
        <div class="etaperecette">
            <br/>
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
            ?> <a href="#" data-toggle="modal" data-target="#modifEtape" class="btn btn-blue">Modifier</a></div>
        <a href="#" data-toggle="modal" data-target="#delete" class="btn btn-blue" style="background-color: red">Supprimer la recette</a>
    </div>

</div>
<!-- Ajouter un ingrédient -->
<div class="modal fade" id="addIngredient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">

            <h3 class="white">Ajouter un ingrédient</h3>
            <form action="/AddIngredient/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <select class="selectpicker white" data-live-search="true" name="name" data-style="btn-primary" data-width="75%" data-size="10" title="<span class='white'>Aucun ingédient</span>" multiple show-menu-arrow>
                    <?php
                    $ingredients = GestionIngredient::getAllIngredients(); /* a modifier pour le mettre dans le Controleurs !!!! */
                    foreach ($ingredients as $row)
                    {
                        echo '<option data-tokens="'.$row['name'].'"><p class="white">'.$row['name'].'</p></option>'."\n";
                    }
                    ?>
                </select>
                <a href="#" data-toggle="modal" data-target="#addIngredientSpe" class="btn btn-blue">Ajoute un Ingrédient spécifique</a><br/>
                <input type="number" class="form-control form-white" name="quantite" placeholder="Quantité pour une personne">
                <input type="text" class="form-control form-white" name="type_quantite" placeholder="grammes">
                <button type="submit"  name="ingredient" value="yes" class="btn btn-submit">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<!-- /Ajouter un ingrédient/ -->
<!-- Ajouter un ingrédient spécifique -->
<div class="modal fade" id="addIngredientSpe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">

            <h3 class="white">Ajouter un nouvelle ingrédient</h3>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

            <form action="/AddIngredient/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <input type="text" class="form-control form-white" name="name" placeholder="Ingrédient">
                <button type="submit"  name="ingredientSpe" value="yes" class="btn btn-submit">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<!-- /Ajouter un ingrédient spécifique/ -->
<!-- Modifier name -->
<div class="modal fade" id="modifName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <input type="text" class="form-control form-white" name="value" value="<?php echo $name; ?>">
                <button type="submit"  name="modifName" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier name/ -->
<!-- Modifier DescLongue -->
<div class="modal fade" id="modifDesLongue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <textarea style="height: 300px" type="text" class="form-control form-white" name="value" "><?php echo $desLongue; ?></textarea>
                <button type="submit"  name="modifDesLongue" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier DescLongue/ -->
<!-- Modifier DescCourte -->
<div class="modal fade" id="modifDesCourte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <textarea style="height: 300px" type="text" class="form-control form-white" name="value" "><?php echo $desCourte; ?></textarea>
                <button type="submit"  name="modifDesCourte" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier DescCourte/ -->
<!-- Modifier difficulte -->
<div class="modal fade" id="modifDifficulte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <p class="white">Diffculté :<span class="white" name="value" id="difficulteCheck"></span></p>
                <input type="range" onchange="refreshdifficulteCheck();" min="0" max="10" id="rangeDifficulte" value="<?php echo $difficulte;?>" step="1" list="tickmarks" class="form-control form-white" name="value">
                <datalist id="tickmarks">
                    <option value="0">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                    <option value="4">
                    <option value="5">
                    <option value="6">
                    <option value="7">
                    <option value="8">
                    <option value="9">
                    <option value="10">
                </datalist>
                <button type="submit"  name="modifDifficulte" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier DescCourte/ -->

<!-- Modifier tempsPrep -->
<div class="modal fade" id="modifTempsPrep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <input type="number" class="form-control form-white" value="<?php echo $tmpsPrep;?>" name="value" placeholder="Temps de préparation(minute)">
                <button type="submit"  name="modifTempsPrep" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier tempsPrep/ -->

<!-- Modifier tempsCuisson -->
<div class="modal fade" id="modifTempsCuisson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <input type="number" class="form-control form-white" name="value" value="<?php echo $tmps_cuisson;?>" placeholder="Temps de cuisson(minute)">
                <button type="submit"  name="modifTempsCuisson" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier tempsCuisson/ -->

<!-- Modifier Etapes -->
<div class="modal fade" id="modifEtape" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <textarea style="height: 400px" type="text" class="form-control form-white" name="value" "><?php echo $etapes; ?></textarea>
                <button type="submit"  name="modifEtape" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier Etapes/ -->

<!-- Modifier Statu -->
<div class="modal fade" id="modifStatu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-danger">
                        <p class="white" style="display: inline">Privée</p><input  type="radio" id="privéeCheckBox" value="privee" name="value" placeholder="Privée" checked >
                    </label>
                    <label class="btn btn-primary">
                        <p class="white" style="display: inline">Brouillon</p><input type="radio" id="publicCheckBox" value="brouillon" name="value" placeholder="Brouillon">
                    </label>
                    <label class="btn btn-success">
                        <p class="white" style="display: inline">Public</p><input type="radio" id="publicCheckBox" value="public" name="value" placeholder="Public">
                    </label>

                </div>
                <button type="submit"  name="modifStatu" value="yes" class="btn btn-submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<!-- /Modifier Statu/ -->
<!-- delette Statu -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <h1 class="white">Vous êtes sûrs ? </h1>
            <form action="/FormModifierRecette/modification/<?echo $data['id']; ?>" class="popup-form" method="post">
                <button type="submit"  name="delete" value="yes" class="btn btn-blue">OUI</button>
                <a href="#" data-toggle="modal" data-target="#delete" class="btn btn-blue">NON</a>
            </form>
        </div>
    </div>
</div>
<!-- /delette Statu/ -->

<script>
    refreshdifficulteCheck();
    function refreshdifficulteCheck() {
        var x = document.getElementById("rangeDifficulte").value;
        document.getElementById("difficulteCheck").innerHTML=" "+x;
    }
</script>
