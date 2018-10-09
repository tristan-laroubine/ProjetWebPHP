<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 11:29
 */
require "ConnexionBD.php";

/** Retourn un curseur correspond à l'utilisateur avec l'id qui lui est donnée
 * @param $id id de l'utilisateur
 * @return array
 */
function getUserById($id)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('SELECT * FROM USER WHERE id = ?;');
    $sql->bindValue( 1 , $id , PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetchAll();
}

/** getUserByNameAndPassword retourn un cursor si le combo id et mdp est juste.
 * @param $name identifiant de l'utilisateur
 * @param $mdp Mots de passe de l'utilisateur
 * @return array curseur renvoyé par la requête
 */
function getUserByNameAndPassword($name, $mdp)
{
    $bdd = getConnextionBD();
    $sql = $bdd -> prepare( 'SELECT * FROM USER WHERE name= ? AND mdp = ?');
    $sql->bindValue( 1 , $name , PDO::PARAM_STR);
    $sql->bindValue( 2 , $mdp , PDO::PARAM_STR);
    $sql->execute();
    return $sql->fetchAll();
}

/** Renvois le grade si l'utilisateur est bien connecter
 * @param $name
 * @param $password
 * @return mixed
 */
function intIsConnect($name, $password)
{
    foreach (getUserByNameAndPassword($name,$password) as $row )
    {
        return $row['grade'];
    }
}

/**Retourn l'id correspondant à la requête
 * @param $Array
 */
function getIdByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['id'];
    }
}

/**Retourn l'identifiant correspondant à la requête
 * @param $Array
 */
function getNameByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['name'];
    }
}

/**Retourn le mots de passe correspondant à la requête
 * @param $Array
 */
function getMdpByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['mdp'];
    }
}

/**Retourn le grade correspondant à la requête
 * @param $Array
 */
function getGradeByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['grade'];
    }
}

/**Retourn l'email correspondant à la requête
 * @param $Array
 */
function getEmailByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['email'];
    }
}

/**Retourn l'émail de récupération correspondant à la requête
 * @param $Array
 */
function getRecupByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['recup'];
    }
}

/** addUser ajoute un user dans la base de donnée, dans la table USER
 * @param $name identifiant de l'utilisateur
 * @param $mdp mots de passe codée en MD5
 * @param $grade Grade de l'utilisateur
 * @param $email émail de l'utilisateur
 * @param $recup émail de récupération de mots de passe en cas de perte de mots de passe
 */
function addUser($name, $mdp, $grade, $email, $recup)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare('INSERT INTO USER ( name, mdp, grade, email, recup ) VALUES (?,?,?,?,?) ');
    $sql->bindValue(1, $name , PDO::PARAM_STR);
    $sql->bindValue(2, $mdp , PDO::PARAM_STR);
    $sql->bindValue(3, $grade , PDO::PARAM_INT);
    $sql->bindValue(4, $email , PDO::PARAM_STR);
    $sql->bindValue(5, $recup , PDO::PARAM_STR);

    $sql->execute();

}

/**Change l'id de l'utilisateur en fonction de son id, attention cette fonction peut être très dangereuse ( si deux utilisateurs ce retrouve avec le même id )
 * @param $idOld ancien ID
 * @param $idNew Nouveau ID
 */
function setIdById($idOld ,$idNew)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE USER SET id=? WHERE id=?');
    $sql->bindValue( 2 , $idOld );
    $sql->bindValue( 1 , $idNew);
    $sql->execute();
}

/**Change le name de l'utilisateur en fonction de son id
 * @param $idOld ancien ID
 * @param $idNew Nouveau ID
 */
function setNameById($id ,$name)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE USER SET name=? WHERE id=?');
    $sql->bindValue( 1 , $name );
    $sql->bindValue( 2 , $id );
    $sql->execute();
}

/**Change le MDP de l'utilisateur en fonction de son id
 * @param $id id de l'utilisateur concerner
 * @param $mdp le nouveaux mots de passe
 */
function setMdpById($id ,$mdp)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE USER SET mdp=? WHERE id=?');
    $sql->bindValue( 1 , $mdp );
    $sql->bindValue( 2 , $id );
    $sql->execute();
}

/**Change le Grade de l'utilisateur en fonction de son id
 * @param $id id de l'utilisateur concerner
 * @param $grade le nouveaux grade
 */
function setGradeById($id ,$grade)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE USER SET grade=? WHERE id=?');
    $sql->bindValue( 1 , $grade );
    $sql->bindValue( 2 , $id );
    $sql->execute();
}

/**Change le email de l'utilisateur en fonction de son id
 * @param $id id de l'utilisateur concerner
 * @param $email la nouvelle email
 */
function setEmailById($id ,$email)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE USER SET email=? WHERE id=?');
    $sql->bindValue( 1 , $email );
    $sql->bindValue( 2 , $id );
    $sql->execute();
}

/**Change le recup de l'utilisateur en fonction de son id
 * @param $id id de l'utilisateur concerner
 * @param $grade le nouveaux recup
 */
function setRecupById($id ,$recup)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE USER SET recup=? WHERE id=?');
    $sql->bindValue( 1 , $recup );
    $sql->bindValue( 2 , $id );
    $sql->execute();
}

function RecupMdpWithEmail($email)
{

     // Plusieurs destinataires
     $to  = 'tristan.LAROUBINE@etu.univ-amu.fr'; // notez la virgule

     // Sujet
     $subject = 'Calendrier des anniversaires pour Août';

     // message
     $message ='
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        h1{
            text-align: center;
            color: #0D3349;
        }
    </style>
    <title>Test</title>
</head>
<body>
    <h1> Cook & Burn : Changement de mots de passe</h1>
    <p>Bonjour $name, <br/>
    Suite à votre demande de changement de mots de passe voici le nouveau mots de passe.<br/>
    Vous pourrez par la suite modifier celui ci dans votre page personelle</p>
<h2>FZEJPOFJOPFZE</h2>
    <a herf="#">Cook & Burn</a>
</body>
</html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
     $headers[] = 'From: Anniversaire <anniversaire@example.com>';
     $headers[] = 'Cc: anniversaire_archive@example.com';
     $headers[] = 'Bcc: anniversaire_verif@example.com';

     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));
     echo "test";

}
