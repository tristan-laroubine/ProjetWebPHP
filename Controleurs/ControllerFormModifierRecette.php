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
        if (!GestionUser::isUserCreateThisRecette($_SESSION['id'],$idRecette))
        {
            header('Location: /viewError/erreur/2');
            exit();
        }
        if ($_POST['modifName'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setNameById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['modifDesLongue'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDesLongueById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }


        if ($_POST['modifDesCourte'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDesCourteById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }

        if ($_POST['modifDifficulte'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDifficulteById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }

        if ($_POST['modifDesLongue'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setDesLongueById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }

        if ($_POST['modifTempsPrep'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setTmpsPrepById($idRecette,$value);
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        if ($_POST['modifTempsCuisson'] == 'yes') {
            if (isset($_POST['value'])) {
                $value = htmlspecialchars(filter_input(INPUT_POST, 'value'));
                GestionRecette::setTmps_cuissonById($idRecette,$value);
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
