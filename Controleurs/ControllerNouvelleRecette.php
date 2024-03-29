<?php
require_once('Views/View.php');
class ControllerNouvelleRecette
{
    private $_recetteModel;
    private $_view;

    public function __construct($url = null)
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        //1 car un seul parametre dans l'URL, dans l'accueil, seulement pour charger le controller
        if(isset($url) && count($url) > 1) {

            throw new Exception('Page introuvable');
        }
        else
            $this->recette();
    }

    private function recette()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }
        $this->_view = new View('NouvelleRecette');
        $this->_view->generate(array('recette' => 'coucou'));
    }
}
