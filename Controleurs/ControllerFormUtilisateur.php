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
        session_start();
        if ($_POST['modifName']=='yes'){
            if (isset($_POST['nameForm'])) {
                $nameForm = htmlspecialchars(filter_input(INPUT_POST, 'nameForm'));
                GestionUser::setNameById($_SESSION['id'],$nameForm);
                header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                exit();
            }
        }
        elseif ($_POST['modifMDP']=='yes')
        {
            if (isset($_POST['mdpForm'])) {
                $mdpForm = htmlspecialchars(filter_input(INPUT_POST, 'mdpForm'));
                GestionUser::setMdpById($_SESSION['id'],$mdpForm);
                header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                exit();
            }
        }
        elseif ($_POST['modifEmail']=='yes')
        {
            if (isset($_POST['emailForm'])) {
                $emailForm = htmlspecialchars(filter_input(INPUT_POST, 'emailForm'));
                GestionUser::setEmailById($_SESSION['id'],$emailForm);
                header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                exit();
            }
        }
        elseif ($_POST['modifRecup']=='yes')
        {
            if (isset($_POST['recupForm'])) {
                $recupForm = htmlspecialchars(filter_input(INPUT_POST, 'recupForm'));
                GestionUser::setRecupById($_SESSION['id'],$recupForm);
                header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                exit();
            }
        }
        else {
            require_once('Views/viewError.php');
        }
    }
}
