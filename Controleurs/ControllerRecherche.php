<?php
require_once('Views/View.php');
class ControllerRecherche
{
    private $_recetteModel;
    private $_view;



    public function recherche()
    {
        $connecter = false;
        if (isset($_SESSION['id']))
        {
            $connecter = true;
        }

        $motsClee = null;

        if (isset($_POST['search'])) {
            $motsClee  = htmlspecialchars(filter_input(INPUT_POST, 'search'));

        }

        $data = [];
        $data += ['mot' => $motsClee];
        $data += ['name' => GestionRecherche::getRecetteWithDataInName($motsClee,$connecter)];
        $data += ['desc' => GestionRecherche::getRecetteWithDataInDesc($motsClee,$connecter)];
        $data += ['etape' => GestionRecherche::getRecetteWithDataInEtape($motsClee,$connecter)];

        $this->_view = new View('Recherche');
        $this->_view->generate($data);

    }
}
