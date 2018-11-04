<?php
require_once('Views/View.php');
class ControllerRecherche
{
    private $_recetteModel;
    private $_view;

    public function __construct($url = null)
    {

    }

    public function recherche($param = [])
    {
        $connecter = false;
        if (isset($_SESSION['id']))
        {
            $connecter = true;
        }

        if (empty($param)) {
            require_once('Views/viewError.php');
            exit();
        }
        $motsClee = null;

        if (isset($param[0])) {
            $motsClee = $param[0];
        }

        $data = null;

        $this->_view = new View('Gestion');
        $this->_view->generate($data);

    }
}
