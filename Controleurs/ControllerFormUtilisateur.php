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
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_POST['modifName']=='yes'){
            if (isset($_POST['nameForm'])) {
                if(strlen($_POST['nameForm']) <=0){
                    $_SESSION['erreur']="L'username ne peut pas être vide";
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }
                if(GestionUser::isNameIsUse($_POST['nameForm'])){
                    $_SESSION['erreur']="L'username n'est pas valide";
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }

                    $nameForm = htmlspecialchars(filter_input(INPUT_POST, 'nameForm'));
                    GestionUser::setNameById($_SESSION['id'], $nameForm);
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();

            }
        }
        elseif ($_POST['modifMDP']=='yes')
        {
            if (isset($_POST['mdpForm'])) {
                if(strlen($_POST['mdpForm'])<10 || strlen($_POST['mdpForm'])>32){
                    $_SESSION['erreur']="Le mot de passe doit être compris entre 10 et 32 caractères";
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }
                $mdpForm = htmlspecialchars(filter_input(INPUT_POST, 'mdpForm'));
                GestionUser::setMdpById($_SESSION['id'],$mdpForm);
                header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                exit();
            }
        }
        elseif ($_POST['modifEmail']=='yes')
        {
            if (isset($_POST['emailForm'])) {
                if(preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['emailForm'])) {
                    $emailForm = htmlspecialchars(filter_input(INPUT_POST, 'emailForm'));
                    GestionUser::setEmailById($_SESSION['id'], $emailForm);
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }else{
                    $_SESSION['erreur']="L'email n'est pas valide";
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }
            }
        }
        elseif ($_POST['modifRecup']=='yes')
        {
            if (isset($_POST['recupForm'])) {
                if(preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['recupForm'])) {
                    $recupForm = htmlspecialchars(filter_input(INPUT_POST, 'recupForm'));
                    GestionUser::setRecupById($_SESSION['id'], $recupForm);
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }else{
                    $_SESSION['erreur']="L'email de récupération n'est pas valide";
                    header('Location: http://tristan-info.alwaysdata.net/Utilisateur');
                    exit();
                }
            }
        }
        else {

            require_once('Views/viewError.php');
            exit();
        }
    }
}
