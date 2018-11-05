<?php
require_once('Views/View.php');
class ControllerModifierRecette
{
    private $_view;

    public function recette($param = [])
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idRecette = $param[0];

        $idRecette = (int)$idRecette;

        $recette = GestionRecette::getRecetteById($idRecette);
        if (!GestionUser::isUserCreateThisRecette($_SESSION['id'],$idRecette) AND $_SESSION['grade'] < 100)
        {
            header('Location: /viewError/erreur/3');
            exit();
        }
        if (GestionFavoris::getFavoriByIdUAndIdR($_SESSION['id'],$idRecette)!= false)
        {
            $recette += ['favori' => 'yes'];
        }
        else
        {
            $recette += ['favori' => 'no'];
        }
        $this->_view = new View('ModifierRecette');
        $compositions = GestionCompose::getAllIngredientsById($idRecette);

        $recette += ['compose' => $compositions];
        $this->_view->generate($recette);
    }

    public function admin($param = [])
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idRecette = $param[0];

        $idRecette = (int)$idRecette;

        $recette = GestionRecette::getRecetteById($idRecette);
        if (GestionFavoris::getFavoriByIdUAndIdR($_SESSION['id'],$idRecette)!= false)
        {
            $recette += ['favori' => 'yes'];
        }
        else
        {
            $recette += ['favori' => 'no'];
        }
        $this->_view = new View('ModifierRecette');
        $compositions = GestionCompose::getAllIngredientsById($idRecette);

        $recette += ['compose' => $compositions];
        $this->_view->generate($recette);
    }
}
