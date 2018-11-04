<?php
require_once('Views/View.php');
class ControllerGestion
{
    private $_recetteModel;
    private $_view;

    public function __construct( $url = null)
    {

        //1 car un seul parametre dans l'URL, dans l'accueil, seulement pour charger le controller
//        var_dump($url);die;

        //$this->recette();

    }

    public function index()
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
        $data = [];
        $recettes = GestionRecette::getAllRecette();
        $data += ['recettes'=>$recettes];

        $users = GestionUser::getAllUsers();
        $data += ['users'=>$users];

        $burns = GestionRecette::getAllBurns();
        $data += ['burns'=>$burns];

        $compose =  GestionCompose::getAllComposes();
        $data += ['composes'=>$compose];

        $crees =  GestionRecette::getAllCrees();
        $data += ['crees'=>$crees];

        $favoris =  GestionFavoris::getAllFavoris();
        $data += ['favoris'=>$favoris];

        $ingredient =  GestionIngredient::getAllIngredients();
        $data += ['ingredients'=>$ingredient];


        $tempdata =  GestionDataWeb::getValueDataWeb1();
        $data += ['setup'=>$tempdata];


        $this->_view = new View('Gestion');
        $this->_view->generate($data);
    }
}
