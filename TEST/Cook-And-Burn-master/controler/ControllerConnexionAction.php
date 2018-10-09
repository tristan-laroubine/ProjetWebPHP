<?php
session_start();
//include('../view/viewSignUp
//include('./model/User.php');
//include ('ControllerSignUpAction.php');
error_reporting(E_ALL);
ini_set('display-errors','on');

class ControllerConnexionAction
{
    private $test;
    public function __construct()
    {
        $this->verif();
    }

    public function verif()
    {
    	if(empty($_POST['name']) || empty($_POST['password'])){
    		echo 'Remplir les champs !';
    	}
    	else{
    		$nameconect = htmlspecialchars($_POST['name']);
   			$mdpconnect = sha1($_POST['password']);
   			$aUser = new User($nameconect,$mdpconnect, "", "");
   			$test = new UserModel();
   			if($test->connexion($aUser) == true){
   				echo 'Vous êtes connecté en tant que :'.'<br/>';
   				$_SESSION['pseudo'] = $nameconect;
   				header("location:index");

                //echo $_SESSION['pseudo'];

   			}
   			else{
   				echo 'erreur';
   			}
    	}
    }
}
?>