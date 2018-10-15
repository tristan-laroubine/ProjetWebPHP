<?php
require_once('Views/View.php');
require_once ('Modeles/GestionUser.php');
class ControllerFormUtilisateur
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
            $this->modification();
    }

    private function modification()
    {
        if ($_POST['modifName']=='yes'){
            echo 'Modif Name';
        }
        elseif ($_POST['modifMDP']=='yes')
        {
            echo 'modifMDP';
        }
        else {
            echo 'jsépas';
        }
//        if (isset($_POST['idForm'])) {
//            $idForm = htmlspecialchars(filter_input(INPUT_POST, 'idForm'));
//        }
//
//        if (isset($_POST['mdpForm']) and is_string($_POST['mdpForm'])) {
//            $mdpForm = htmlspecialchars(filter_input(INPUT_POST, 'mdpForm'));
//        }
//
//
//        if (GestionUser::isRightIdAndMdp($idForm,$mdpForm)) {
//            $user = GestionUser::getUserByNameAndPassword($idForm, $mdpForm);
//            session_start();
//            $_SESSION['id'] = $user['id'];
//            $_SESSION['grade'] = $user['grade'];
//        }
//        header('Location: http://tristan-info.alwaysdata.net');
//        exit();
    }
}
