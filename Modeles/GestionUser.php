<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 11:29
 */
require "ConnexionBD.php";
function getUserById($id)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('SELECT * FROM USER WHERE id = ?;');
    $data = $sql->execute(array(
       $id
    ));
    return $data;
}


function getUserByNameAndPassword($name, $password)
{
    $bdd = getConnextionBD();
    $sql =  'SELECT * FROM USER WHERE name= "'.$name.'" AND mdp = "'.$password.'"';
    return $bdd-> query($sql);
}

function intIsConnect($name, $password)
{
    foreach (getUserByNameAndPassword($name,$password) as $row )
    {
        return $row['grade'];
    }
}

function addUser($name, $mdp, $grade, $email, $recup)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare('INSERT INTO USER ( name, mdp, grade, email, recup )
    VALUES (?,?,?,?,?) ');
    $sql->execute(array(
        $name, $mdp, $grade, $email, $recup
    ));

}