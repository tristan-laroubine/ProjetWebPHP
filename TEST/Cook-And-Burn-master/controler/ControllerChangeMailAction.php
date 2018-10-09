<?php
//include('../view/viewSignUp
//include('./model/User.php');
//include ('ControllerSignUpAction.php');
session_start();
error_reporting(E_ALL);
ini_set('display-errors','on');

class ControllerChangeMailAction
{
    private $test;
    public function __construct()
    {
        $this->changeMail();
    }

    public function changeMail()
    {
        if(empty($_POST['oldMail']) || empty($_POST['newMail']) || empty($_POST['newMail2']))
        {
            echo "Vous n'avez pas rempli tous les champs.";
        }
        else{
            $mail1 = htmlspecialchars($_POST['oldMail']);
            $mail2 = htmlspecialchars($_POST['newMail']);
            $mail3 = htmlspecialchars($_POST['newMail2']);

            $test = new UserModel();

            if($mail2 == $mail3)
            {

                $test->mailChange($_SESSION['pseudo'],$mail1,$mail2);
                echo "coucou";

            }

        }

    }
}

?>