<?php
require_once('Views/View.php');
class ControllerFormConnection
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
            $this->connection();
    }

    private function connection()
    {

        if (isset($_POST['idForm']))
        {
            $idForm = protect_input(filter_input(INPUT_POST,'idForm'));
        }

        if (isset($_POST['mdpForm']) and is_string($_POST['mdpForm']))
        {
            $mdpForm = protect_input(filter_input(INPUT_POST,'mdpForm'));
        }
        function protect_input($value)
        {

            $value = htmlspecialchars($value);

            return $value;
        }


//      if ( ! session_id() ) @ session_start();
        session_start();
        $_SESSION['id']=5;



        $this->_view = new View('Index');
        $this->_view->generate(array('recette' => 'coucou'));
    }
}
