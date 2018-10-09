
<?php
//include('../view/viewSignUp
//include('./model/User.php');
//include ('ControllerSignUpAction.php');
error_reporting(E_ALL);
ini_set('display-errors','on');

class ControllerSignUpAction
{
    private $test;
    public function __construct()
    {
        $this->verif();
    }

    public function verif()
    {
        if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['mail'] || empty($_POST['password2'])))
        {
            echo "Il faut tout remplir";
            //header('location:Index');
        }
        else
        {
            $longueurKey = 15;
            $key = "";
            for($i=1; $i <$longueurKey;++$i){
                $key .= mt_rand(0,9);
            }

            //require_once ('./model/reCaptcha/autoload.php');
            $recaptcha = new \ReCaptcha\ReCaptcha('6Lcy3XMUAAAAADkAvu0vbHEM8GURkxLbYOGCoWnh');

            $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
            $nameUser = htmlspecialchars($_POST['name']);
            $firstNameUser = sha1($_POST['password']);
            $firstNameUser2 = sha1($_POST['password2']);
            $mailUser = htmlspecialchars($_POST['mail']);
            $mailUser2 = htmlspecialchars($_POST['mail2']);
            $aUser = new User($nameUser,$firstNameUser, $mailUser, $key);
            $pseudolength = strlen($nameUser);
            $test = new UserModel();
            if($pseudolength <= 255){
                if($firstNameUser == $firstNameUser2){
                    if($mailUser == $mailUser2){
                        if(filter_var($mailUser, FILTER_VALIDATE_EMAIL)){
                            if($test->verifUser($aUser) == false){ //Vérifie si le pseudo est utilisé
                                if($test->verifUserEmail($aUser) == false){
                                    if ($resp->isSuccess() === true)
                                    {
                                        try
                                        {
                                            $to      = $mailUser;
                                            $subject = 'Validation de l inscription';
                                            $message = '
                                            <html>
                                                <body>
                                                    <div align="center">
                                                        <a href="http://cookandburn-gxaj.alwaysdata.net/Confirmation?$pseudo='.urlencode($nameUser).'$key='.$key.'">Clique pour confirmer ton compte !<a/>
                                                        <p> Votre pseudo : </p>
                                                        ' . urlencode($nameUser) . ' 
                                                        <p> Votre clé secréte : </p>
                                                        '. $key . ' 
                                                    </di>
                                                </body>
                                            </html>';
                                            $headers = "From: \"Cook And Burn\"<cookandBurn@domaine.com>\n";
                                            $headers .= "Reply-To: no-reply@domaine.com\n";
                                            $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
                                            mail($to, $subject, $message, $headers);
                                            $test->insertUser($aUser);
                                        }
                                        catch(PDOException $e)
                                        {
                                            die('Error : ' . $e->getMessage());
                                        }
                                        echo $key;
                                        echo "Inscription réussit !";
                                        echo $aUser->getNameUser();
                                        //header('location:Index');
                                    }
                                    else{

                                        echo "Valider le captcha !";
                                    }
                                }
                                else{
                                    echo "Email déjà utilisé !";
                                }
                                
                            }
                            else{
                                echo "Pseudo déjà utilisé !";
                            }          
                        }
                        else{
                            echo "Votre adresse mail n'est pas valide !";
                        }   
                    }
                    else{
                        echo "Les adresses emails ne correspondent pas !";
                    }
                }
                else{
                    echo "Vos mots de passes ne correspondent pas !";
                }      
            }
            else{
                echo "Votre pseudo ne doit pas dépasser 255 caractères !";
            }
                
       
        }
    }
}




?>