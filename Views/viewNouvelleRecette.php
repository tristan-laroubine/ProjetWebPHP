<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 16/10/18
 * Time: 13:48
 */
require_once 'Modeles/GestionIngredient.php';
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

?>
<div class="likeFooter">
    <br/>
</div>
<?php
if(isset($_SESSION['erreur']))
{
    echo'<h3 style="color: red;">'. $_SESSION['erreur'].'</h3>';
    unset($_SESSION['erreur']);
}
?>
<div class="modal-dialog">
    <div class="modal-content modal-popup">
        <h3 class="white">Création d'une nouvelle recette</h3>
        <form action="/FormNouvelleRecette" class="pop-form" method="post">
            <input type="text" class="form-control form-white" name="nameRecette" placeholder="Titre">
            <input type="number" class="form-control form-white" name="tmpsPrepRecette" placeholder="Temps de préparation(minute)">
            <input type="number" class="form-control form-white" name="tmps_CuissonRecette" placeholder="Temps de cuisson(minute)">
            <p class="white">Diffculté :<span class="white" name="difficulteRecette" id="difficulteCheck"></span></p>
            <input type="range" onchange="refreshdifficulteCheck();" min="0" max="10" id="rangeDifficulte" step="1" list="tickmarks" class="form-control form-white" name="difficulteRecette">

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

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-danger">
                    <p class="white" style="display: inline">Privée</p><input  type="radio" id="privéeCheckBox" value="privee" name="statutRecette" placeholder="Privée" checked >
                </label>
                <label class="btn btn-primary">
                    <p class="white" style="display: inline">Brouillon</p><input type="radio" id="publicCheckBox" value="brouillon" name="statutRecette" placeholder="Brouillon">
                </label>
                <label class="btn btn-success">
                    <p class="white" style="display: inline">Public</p><input type="radio" id="publicCheckBox" value="public" name="statutRecette" placeholder="Public">
                </label>

            </div>

            <textarea  style="height: 250px" class="form-control form-white" name="desCourte" placeholder="Description Courte"></textarea>
            <textarea  style="height: 500px" class="form-control form-white" name="desLongue" placeholder="Description Longue"></textarea>
            <textarea  style="height: 500px" class="form-control form-white" name="etapes">
Etape 1 :



Etape 2 :

Etape 3 :</textarea>
            <br/>

            <button type="submit"   value="yes" class="btn btn-submit">Ajouter   <span class="glyphicon glyphicon-send"/></button>

        </form>
    </div>
</div>



<script>
    refreshdifficulteCheck();
    function refreshdifficulteCheck() {
        var x = document.getElementById("rangeDifficulte").value;
        document.getElementById("difficulteCheck").innerHTML=" "+x;
    }
</script>