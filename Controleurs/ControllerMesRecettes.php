<?php
require_once('Views/View.php');
class ControllerMesRecettes
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
        $Idrecettes = GestionRecette::getIdsRecettesCREE($idUser);

        $recettes = [];
        foreach ($Idrecettes as $row)
        {
            $recettes[] = GestionRecette::getRecetteById($row['idRecette']);

        }

        $this->_view = new View('MesRecettes');

        $this->_view->generate($recettes);
    }
}
