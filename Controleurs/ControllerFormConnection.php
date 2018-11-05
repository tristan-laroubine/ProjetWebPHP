<?php
require_once('Views/View.php');
require_once ('Modeles/GestionUser.php');
class ControllerFormConnection
{


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

        if (isset($_POST['idForm'])) {
            $idForm = htmlspecialchars(filter_input(INPUT_POST, 'idForm'));
        }

        if (isset($_POST['mdpForm']) and is_string($_POST['mdpForm'])) {
            $mdpForm = htmlspecialchars(filter_input(INPUT_POST, 'mdpForm'));
        }


        if (GestionUser::isRightIdAndMdp($idForm,$mdpForm) AND !empty($idForm) AND !empty($mdpForm)) {
            $user = GestionUser::getUserByNameAndPassword($idForm, $mdpForm);
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['grade'] = $user['grade'];
        }else{
            $_SESSION['erreur']=" Identifiant ou mot de passe incorrect";
            header('Location: /');
            exit();
        }
        header('Location: http://tristan-info.alwaysdata.net');
        exit();
    }

    private function recupMdp()
    {

        if (isset($_POST['idForm'])) {
            if (GestionUser::getUserById($_POST['idForm']) != false) {
                $idForm = htmlspecialchars(filter_input(INPUT_POST, 'idForm'));
            }else{
                $_SESSION['erreur']="L'identifiant n'existe pas";
                header('Location: /');
                exit();
            }
        }

        if (isset($_POST['recupForm']) and is_string($_POST['recupForm'])) {
            if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['recupForm'])) {
                $recupForm = htmlspecialchars(filter_input(INPUT_POST, 'recupForm'));
            }else{
                $_SESSION['erreur']="Email de récupération invalide";
                header('Location: /');
                exit();
            }
        }
        $user = GestionUser::getUserById($idForm);
        if($user['recup'] == $recupForm)
        {
            GestionUser::RecupMdpWithEmail($idForm);
        }

        header('Location: http://tristan-info.alwaysdata.net');
        exit();
    }
}
