<?php
require_once('Views/View.php');
class ControllerMesFavoris
{
    private $_view;


    public function index()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idUser = $_SESSION['id'];
        $Idrecettes = GestionFavoris::getFavoriByIdUser($idUser);



        $recettes = [];
        foreach ($Idrecettes as $row)
        {
            $recettes[] = GestionRecette::getRecetteById($row['id_recette']);
        }


        $this->_view = new View('MesFavoris');
        $this->_view->generate($recettes);

    }
}
