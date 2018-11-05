<?php
require_once('Views/View.php');
class ControllerAddIngredient
{
    private $_recetteModel;
    private $_view;

    public function __construct($url = null)
    {

    }

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

        if ($_POST['ingredientSpe'] == 'yes') {
            if (isset($_POST['name'])) {
                $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
                if(strlen($_POST['name'])<=0)
                {
                    $_SESSION['erreur']="le nom de l'ingrédient ne peut pas être vide";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
                if (GestionIngredient::getIngredientByName($name) == false) {
                    GestionIngredient::addIngredient($name);
                }else{
                    $_SESSION['erreur']="l'ingrédient existe déja";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
            }

            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
        else if ($_POST['ingredient'] == 'yes') {
            if (isset($_POST['name'])) {
                $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
                $ingredient = GestionIngredient::getIngredientByName($name);
            }
            if (isset($_POST['quantite'])) {
                if(strlen($_POST['quantite'])<=0){
                    $_SESSION['erreur']="la quantité ne peut pas être vide";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
                $quantite = htmlspecialchars(filter_input(INPUT_POST, 'quantite'));
            }
            if (isset($_POST['type_quantite'])) {
                if(strlen($_POST['type_quantite'])<=0){
                    $_SESSION['erreur']="le type de la quantité doit être renseigné";
                    header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
                    exit();
                }
                $type_quantite = htmlspecialchars(filter_input(INPUT_POST, 'type_quantite'));
            }
            GestionCompose::addCompose($idRecette,$ingredient['id'],$quantite,$type_quantite);
            header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
            exit();
        }
    else {
        require_once('Views/viewError.php');
        exit();
    }
    }

    public function supprime($param = [])
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

        if (isset($param[1])) {
            $idRecette = $param[1];
        }else{
            require_once('Views/viewError.php');
            exit();
        }

        if (isset($param[0])) {
            $idIngredient = $param[0];
        }else{
            require_once('Views/viewError.php');
            exit();
        }
        GestionCompose::deleteIngredientWithIdRAndIdI($idRecette,$idIngredient);
        header('Location: http://tristan-info.alwaysdata.net/ModifierRecette/recette/' . $idRecette);
        exit();
    }
}
