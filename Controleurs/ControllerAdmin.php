<?php
require_once('Views/View.php');
class ControllerAdmin
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
            $this->recette();
    }
    private function connection()
    {

    }

    private function recette()
    {

        $this->_view = new View('Admin');
        $this->_view->generate(array('recette' => 'coucou'));
    }
}
