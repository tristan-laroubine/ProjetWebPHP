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
function setName($id ,$name)
{
    $bdd = getConnextionBD();
    $requete = 'UPDATE USER SET name=? WHERE id=?';
    $sql =  $bdd -> prepare ($requete);
    $sql->bindValue( 1 , $id );
    $sql->bindValue( 1 , $name );
    $sql->execute();
}
