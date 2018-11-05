<?php
require_once('Views/View.php');
class ControllerFormModifierRecette
{


    public function modification($param = [])
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if (empty($param)) {
            require_once('Views/viewError.php');
            exit();
        }
        $idRecette = null;

        if (isset($param[0])) {
            $idRecette = $param[0];
        }
        if (!GestionUser::isUserCreateThisRecette($_SESSION['id'],$idRecette) AND $_SESSION['grade'] < 100)
        {
            header('Location: /viewError/erreur/2');
            exit();
        }
        if ($_POST['modifName'] == 'yes') {
            if (isset($_POST['value']) ) {
                if(strlen($_POST['value']) <=0 ){
                    $_SESSION['erreur']="Vous devez donner un nom à votre recette ";
                    header('Location: /NouvelleRecette');
                    exit();
                }
                if(!GestionRecette::isNameIsUse($_POST['value'])){


                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setNameById($idRecette,$value);
                 }else
                 {
                    $_SESSION['erreur']="Nom déjà pris";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                 }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['modifDesLongue'] == 'yes') {
            if (isset($_POST['value'])) {
                if(!empty($_POST['value']))
                {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDesLongueById($idRecette,$value);
                }else{
                    $_SESSION['erreur']="Il faut remplir la description longue ";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }


        if ($_POST['modifDesCourte'] == 'yes') {
            if (isset($_POST['value'])) {
                if(!empty($_POST['value'])){
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDesCourteById($idRecette,$value);
                }else{
                    $_SESSION['erreur']="Il faut remplir la description courte ";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }

        if ($_POST['modifDifficulte'] == 'yes') {
            if (isset($_POST['value'])) {
                if($_POST['value']>=1 && $_POST['value']<=10){
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDifficulteById($idRecette,$value);
                }else{
                    $_SESSION['erreur']="La difficulté doit être comprise entre 1 et 10 ";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }

        if ($_POST['modifDesLongue'] == 'yes') {
            if (isset($_POST['value'])) {
                if(!empty($_POST['value']))
                {
                    $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                    GestionRecette::setDesLongueById($idRecette,$value);
                }else{
                    $_SESSION['erreur']="Il faut remplir la description longue ";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }

        if ($_POST['modifTempsPrep'] == 'yes') {

            if (isset($_POST['value'])) {
                if ($_POST['value'] > 0) {
                    $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                    GestionRecette::setTmpsPrepById($idRecette, $value);
                }else{
                    $_SESSION['erreur']="Le temps de preparation ne peut pas être inférieur à 0";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['modifTempsCuisson'] == 'yes') {
            if (isset($_POST['value'])) {
                if ($_POST['value'] > 0) {
                    $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                    GestionRecette::setTmps_cuissonById($idRecette, $value);
                }else{
                    $_SESSION['erreur']="Le temps de cuisson ne peut pas être inférieur à 0";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['modifEtape'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setEtapesById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['modifStatu'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                if ($value == 'privee' OR $value == 'brouillon' OR $value=='public')
                    GestionRecette::setStatutByID($idRecette,$value);
            }


            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['delete'] == 'yes') {
                GestionRecette::deleteRecetteWithId($idRecette);
            header('Location: http://tristan-info.alwaysdata.net/MesRecettes');
            exit();
        }
        else {
            require_once('Views/viewError.php');
            exit();
        }
    }
}
