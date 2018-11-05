<?php
require_once('Views/View.php');
require_once ('Modeles/GestionRecette.php');

require_once ('Modeles/GestionFavoris.php');
class ControllerAddFavoris
{
    private $_recetteModel;
    private $_view;

    public function __construct($url = null)
    {

    }

    public function recette($param = [])
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if (empty($param)) {
            header('Location: /viewError/erreur/2');
            exit();
        }

        $idRecette = null;

        if (isset($param[0])) {
            $idRecette = $param[0];
        }
        if (GestionFavoris::getFavoriByIdUAndIdR($_SESSION['id'],$idRecette) == false)
        {
            GestionFavoris::addFavori($_SESSION['id'],$idRecette);
        }
        header('Location: /Recette/recette/'.$idRecette);
        exit();
    }
    public function delete($param = [])
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if (empty($param)) {
            header('Location: /viewError/erreur/2');
            exit();
        }

        $idRecette = null;

        if (isset($param[0])) {
            $idRecette = $param[0];
        }
        if (GestionFavoris::getFavoriByIdUAndIdR($_SESSION['id'],$idRecette) != false)
        {
            GestionFavoris::deleteFavorisWithIdUserAndIdRecette($_SESSION['id'],$idRecette);
        }
        header('Location: /Recette/recette/'.$idRecette);
        exit();
    }
}
