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
            if (!GestionRecette::isNameIsUse($_POST['nameRecette']))
            $nameRecette = htmlspecialchars(filter_input(INPUT_POST, 'nameRecette'));
        }

        if (isset($_POST['tmpsPrepRecette']) and is_string($_POST['tmpsPrepRecette'])) {
            $tmpsPrepRecette = htmlspecialchars(filter_input(INPUT_POST, 'tmpsPrepRecette'));
        }

        if (isset($_POST['tmps_CuissonRecette']) and is_string($_POST['tmps_CuissonRecette'])) {
            $tmps_CuissonRecette = htmlspecialchars(filter_input(INPUT_POST, 'tmps_CuissonRecette'));
        }

        if (isset($_POST['difficulteRecette']) and is_string($_POST['difficulteRecette']) ) {
            $difficulteRecette = htmlspecialchars(filter_input(INPUT_POST, 'difficulteRecette'));
        }

        if (isset($_POST['statutRecette']) and is_string($_POST['statutRecette'])) {
            if ($_POST['statutRecette'] == 'privee' OR $_POST['statutRecette']=='public' OR $_POST['statutRecette']=='brouillon') {
                $statutRecette = htmlspecialchars(filter_input(INPUT_POST, 'statutRecette'));
            }

        }

        if (isset($_POST['desCourte']) and is_string($_POST['desCourte']) and strlen($_POST['desCourte']) <= 65535) {
            $desCourte = htmlspecialchars(filter_input(INPUT_POST, 'desCourte'));
        }

        if (isset($_POST['desLongue']) and is_string($_POST['desLongue']) and strlen($_POST['desLongue']) <= 65535) {
            $desLongue = htmlspecialchars(filter_input(INPUT_POST, 'desLongue'));
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
