<?php
require_once('Views/View.php');
class ControllerRecette
{
    private $_recetteModel;
    private $_view;

    public function __construct( $url = null)
    {

        //1 car un seul parametre dans l'URL, dans l'accueil, seulement pour charger le controller
//        var_dump($url);die;

            //$this->recette();

    }

    public function recette($param = [])
    {

        if (empty($param)) {
            require_once('Views/viewError.php');
            exit();
        }

        $idRecette = null;

        if (isset($param[0])) {
            $idRecette = $param[0];
        }


        $recette = GestionRecette::getRecetteById($idRecette);
        if (!isset($_SESSION['id']) and $recette['burns']< 10)
        {
            header('Location: /viewError/erreur/1');
            exit();
        }
        if ($recette == false )
        {
            require_once('Views/viewError.php');
            exit();
        }
        if (isset($_SESSION['id']))
        {
            if (GestionFavoris::getFavoriByIdUAndIdR($_SESSION['id'],$idRecette)!= false)
            {
                $recette += ['favori' => 'yes'];
            }
            else
            {
                $recette += ['favori' => 'no'];
            }
        }
        else
        {
            $recette += ['favori' => 'nologin'];
        }

        $compositions = GestionCompose::getAllIngredientsById($idRecette);

            $recette += ['compose' => $compositions];
        $this->_view = new View('Recette');
        $this->_view->generate($recette);
    }
}
