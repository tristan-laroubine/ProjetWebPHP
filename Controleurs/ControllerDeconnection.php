<?php
require_once('Views/View.php');
require_once ('Modeles/GestionUser.php');
class ControllerDeconnection
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
            $this->deconnexion();
    }

    private function deconnexion()
    {
        session_start();
        $_SESSION = array();

        session_destroy();
        header('Location: http://tristan-info.alwaysdata.net');
        exit();
    }
}
