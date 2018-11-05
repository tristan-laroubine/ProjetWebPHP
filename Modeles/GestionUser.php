<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 11:29
 */
require_once "ConnexionBD.php";
class GestionUser
{
    /** Retourn un curseur correspond à l'utilisateur avec l'id qui lui est donnée
     * @param $id id de l'utilisateur
     * @return array
     */
    public static function getUserById($id)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('SELECT * FROM USER WHERE id = ?;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }

    /** getUserByNameAndPassword retourn un cursor si le combo id et mdp est juste.
     * @param $name identifiant de l'utilisateur
     * @param $mdp Mots de passe de l'utilisateur
     * @return array curseur renvoyé par la requête
     */
    public static function getUserByNameAndPassword($name, $mdp)
    {
        $bdd = getConnextionBD();
        $mdp = sha1($mdp);
        $sql = $bdd -> prepare( 'SELECT * FROM USER WHERE name= ? AND mdp = ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->bindValue( 2 , $mdp , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }
    public static function isRightIdAndMdp($name, $mdp)
    {
        $user = self::getUserByNameAndPassword($name,$mdp);
        if ($user['id'] != null )return true;
        else{
            echo '<script language="JavaScript">alert("Mauvais mot de passe")</script>';
            return false;
        }
    }
    /** Renvois le grade si l'utilisateur est bien connecter
     * @param $name
     * @param $password
     * @return mixed
     */
    public static function intIsConnect($name, $password)
    {
        foreach (getUserByNameAndPassword($name,$password) as $row )
        {
            return $row['grade'];
        }
        return null;
    }

    /** addUser ajoute un user dans la base de donnée, dans la table USER
     * @param $name identifiant de l'utilisateur
     * @param $mdp mots de passe codée en MD5
     * @param $grade Grade de l'utilisateur
     * @param $email émail de l'utilisateur
     * @param $recup émail de récupération de mots de passe en cas de perte de mots de passe
     */
    public static function addUser($name, $mdp, $grade, $email, $recup)
    {
        $mdp = sha1($mdp);
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('INSERT INTO USER ( name, mdp, grade, email, recup ) VALUES (?,?,?,?,?) ');
        $sql->bindValue(1, $name , PDO::PARAM_STR);
        $sql->bindValue(2, $mdp , PDO::PARAM_STR);
        $sql->bindValue(3, $grade , PDO::PARAM_INT);
        $sql->bindValue(4, $email , PDO::PARAM_STR);
        $sql->bindValue(5, $recup , PDO::PARAM_STR);

        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


    }

    /**Change l'id de l'utilisateur en fonction de son id, attention cette fonction peut être très dangereuse ( si deux utilisateurs ce retrouve avec le même id )
     * @param $idOld ancien ID
     * @param $idNew Nouveau ID
     */
    public static function setIdById($idOld ,$idNew)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE USER SET id=? WHERE id=?');
        $sql->bindValue( 2 , $idOld );
        $sql->bindValue( 1 , $idNew);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    /**Change le name de l'utilisateur en fonction de son id
     * @param $idOld ancien ID
     * @param $idNew Nouveau ID
     */
    public static function setNameById($id ,$name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE USER SET name=? WHERE id=?');
        $sql->bindValue( 1 , $name, PDO::PARAM_STR);
        $sql->bindValue( 2 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    /**Change le MDP de l'utilisateur en fonction de son id
     * @param $id id de l'utilisateur concerner
     * @param $mdp le nouveaux mots de passe
     */
    public static function setMdpById($id ,$mdp)
    {

        $bdd = getConnextionBD();
        $mdp = sha1($mdp);

        $sql =  $bdd -> prepare ('UPDATE USER SET mdp=? WHERE id=?');
        $sql->bindValue( 1 , $mdp, PDO::PARAM_STR );
        $sql->bindValue( 2 , $id, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    /**Change le Grade de l'utilisateur en fonction de son id
     * @param $id id de l'utilisateur concerner
     * @param $grade le nouveaux grade
     */
    public static function setGradeById($id ,$grade)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE USER SET grade=? WHERE id=?');
        $sql->bindValue( 1 , $grade,PDO::PARAM_INT);
        $sql->bindValue( 2 , $id, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    /**Change le email de l'utilisateur en fonction de son id
     * @param $id id de l'utilisateur concerner
     * @param $email la nouvelle email
     */
    public static function setEmailById($id ,$email)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE USER SET email=? WHERE id=?');
        $sql->bindValue( 1 , $email, PDO::PARAM_STR );
        $sql->bindValue( 2 , $id, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function getAllUsers()
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('SELECT * FROM USER');
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetchAll();
    }
    /**Change le recup de l'utilisateur en fonction de son id
     * @param $id id de l'utilisateur concerner
     * @param $grade le nouveaux recup
     */
    public static function setRecupById($id ,$recup)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE USER SET recup=? WHERE id=?');
        $sql->bindValue( 1 , $recup, PDO::PARAM_STR );
        $sql->bindValue( 2 , $id, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }


    public static function RecupMdpWithEmail($id)
    {
        $newmdp = uniqid ("" ,false);
// Plusieurs destinataires
        $user = self::getUserById($id);
        $to  = $user['email']; // notez la virgule

// Sujet
        $subject = 'Réinitialisation du mots de passe';

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
</head>
<body>
<h1> Cook & Burn : Changement de mots de passe</h1>
<p>Bonjour '.$user['name'].', <br/>
    Suite à votre demande de changement de mots de passe voici le nouveau mots de passe.<br/>
    Vous pourrez par la suite modifier celui ci dans votre page personelle</p>
 
<h2>'.$newmdp.'</h2>
<a herf="#">Cook & Burn</a>
</body>
</html>
';
        self::setMdpById($id,$newmdp);
// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset= utf8\n';

// En-têtes additionnels
        $headers[] = 'From: Cook & Burn < noreply@cook&burn.fr >';
// Envoi
        mail($to, $subject, $message, implode("\r\n", $headers));
        echo "Message envoyé";

    }
    public static function isUserCreateThisRecette($idUser, $idRecette)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('SELECT * FROM CREE WHERE idUser = ? AND idRecette = ?');
        $sql->bindValue( 1 , $idUser, PDO::PARAM_INT );
        $sql->bindValue( 2 , $idRecette, PDO::PARAM_INT );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        $result = $sql->fetch();
        if ($result != false)
        {
            return true;
        }
        else return false;
    }
    public static function deleteUserWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM FAVORIS WHERE id_user = ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql1 = $bdd -> prepare( 'DELETE FROM BURNS WHERE id_user = ?');
        $sql1->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql1->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql2 = $bdd -> prepare( 'DELETE FROM CREE WHERE idUser = ?');
        $sql2->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql2->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql3 = $bdd -> prepare( 'DELETE FROM USER WHERE id = ?');
        $sql3->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql3->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function isNameIsUse($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM USER WHERE name = ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


        if ($sql->fetch() != null)
        {
            return true;
        }
        return false;
    }
}
