<?php
require_once('Views/View.php');
require_once ('Modeles/GestionRecette.php');
class ControllerFormNouvelleRecette
{
    private $_recetteModel;
    private $_view;

    public function __construct($url = null)
    {

        //1 car un seul parametre dans l'URL, dans l'accueil, seulement pour charger le controller
        if(isset($url) && count($url) > 1) {

            throw new Exception('Page introuvable');
        }
        else
            $this->connection();
    }

    private function connection()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }
        if (isset($_POST['nameRecette']) and is_string($_POST['nameRecette']) and strlen($_POST['nameRecette']) <= 32) {
            if(strlen($_POST['nameRecette']) <=0 ){
                $_SESSION['erreur']="Vous devez donner un nom à votre recette ";
                header('Location: /NouvelleRecette');
                exit();
            }
            if (!GestionRecette::isNameIsUse($_POST['nameRecette']))
            {
            $nameRecette = htmlspecialchars(filter_input(INPUT_POST, 'nameRecette'));
            }else
                {
                $_SESSION['erreur']="Nom déjà pris";
                header('Location: /NouvelleRecette');
                exit();
            }
        }

        if (isset($_POST['tmpsPrepRecette']) and is_string($_POST['tmpsPrepRecette'])) {
            if ($_POST['tmpsPrepRecette'] > 0) {
                $tmpsPrepRecette = htmlspecialchars(filter_input(INPUT_POST, 'tmpsPrepRecette'));
            }else{
                $_SESSION['erreur']="Le temps de Preparation ne peut pas être inférieur à 0";
                header('Location: /NouvelleRecette');
                exit();
            }
        }

        if (isset($_POST['tmps_CuissonRecette']) and is_string($_POST['tmps_CuissonRecette'])) {
            if($_POST['tmps_CuissonRecette'] > 0){
            $tmps_CuissonRecette = htmlspecialchars(filter_input(INPUT_POST, 'tmps_CuissonRecette'));
            }else{
                $_SESSION['erreur']="Le temps de Cuisson ne peut pas être inférieur à 0";
                header('Location: /NouvelleRecette');
                exit();
            }
        }

        if (isset($_POST['difficulteRecette']) and is_string($_POST['difficulteRecette']) ) {
            if($_POST['difficulteRecette']>=1 && $_POST['difficulteRecette']<=10){
            $difficulteRecette = htmlspecialchars(filter_input(INPUT_POST, 'difficulteRecette'));
            }else{
                $_SESSION['erreur']="La difficulté doit être compris entre 1 et 10";
                header('Location: /NouvelleRecette');
                exit();
            }
        }

        if (isset($_POST['statutRecette']) and is_string($_POST['statutRecette'])) {

            if ($_POST['statutRecette'] == 'privee' OR $_POST['statutRecette']=='public' OR $_POST['statutRecette']=='brouillon') {
                $statutRecette = htmlspecialchars(filter_input(INPUT_POST, 'statutRecette'));
            }

        }

        if (isset($_POST['desCourte']) and is_string($_POST['desCourte']) and strlen($_POST['desCourte']) <= 65535) {
            if(!empty($_POST['desCourte'])){
            $desCourte = htmlspecialchars(filter_input(INPUT_POST, 'desCourte'));
             }else{
                $_SESSION['erreur']="La description courte doit être remplie";
                header('Location: /NouvelleRecette');
                exit();
            }
        }

        if (isset($_POST['desLongue']) and is_string($_POST['desLongue']) and strlen($_POST['desLongue']) <= 65535) {
            if (!empty($_POST['desLongue'])) {


                $desLongue = htmlspecialchars(filter_input(INPUT_POST, 'desLongue'));
            }else{
                $_SESSION['erreur']="La description longue doit être remplie";
                header('Location: /NouvelleRecette');
                exit();
            }
        }

        if (isset($_POST['etapes']) and is_string($_POST['etapes']) and strlen($_POST['etapes']) <= 65535) {
            $etapes = htmlspecialchars(filter_input(INPUT_POST, 'etapes'));
        }

        GestionRecette::addRecette($nameRecette,(int)$tmpsPrepRecette,(int)$tmps_CuissonRecette,(int)$difficulteRecette,0,$statutRecette,$desCourte,$desLongue,$etapes);
        $recette = GestionRecette::getRecetteByName($nameRecette);
        GestionRecette::addCREE($_SESSION['id'],$recette['id']);
        header('Location: /ModifierRecette/recette/'.$recette['id']);
        exit();
    }
}
