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
    $sql =  'SELECT * FROM USER WHERE id='.$id.';';
    return $bdd-> query($sql);
}


function getUserByNameAndPassword($name, $password)
{
    $bdd = getConnextionBD();
    $sql =  'SELECT * FROM USER WHERE name= "'.$name.'" AND mdp = "'.$password.'";';
    return $bdd-> query($sql);
}
