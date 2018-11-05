<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 24/10/18
 * Time: 14:32
 */
require_once('Views/View.php');
class ControllerAddBurns
{
    private $_view;

    public function recette($param = [])
    {
        if (!isset($_SESSION['id'])) {
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
        if (GestionRecette::isPutBurns($_SESSION['id'], $idRecette) == false) {
            GestionRecette::addBurns( $idRecette,$_SESSION['id']);
        } else {
            $_SESSION['erreur'] = "Vous avez déja mis un burn à cette recette";
            header('Location: http://tristan-info.alwaysdata.net/Recette/recette/' . $idRecette);
            exit();
        }
        header('Location: /Recette/recette/' . $idRecette);
        exit();
    }

}//ControllerAddBurns