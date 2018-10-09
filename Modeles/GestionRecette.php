<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 08/10/18
 * Time: 16:49
 */
require_once 'ConnexionBD.php';




function addRecette($name, $tmpsPrep, $tmps_cuisson, $difficulte, $burns,$statut,$desCourte,$descLongue,$etapes)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare('INSERT INTO RECETTE ( name, tmpsPrep,tmps_cuisson, difficulte, burns,statut,desCourte,desLongue,etapes ) VALUES (?,?,?,?,?,?,?,?,?) ');
    $sql->bindValue(1, $name , PDO::PARAM_STR);
    $sql->bindValue(2, $tmpsPrep , PDO::PARAM_INT);
    $sql->bindValue(3, $tmps_cuisson , PDO::PARAM_INT);
    $sql->bindValue(4, $difficulte , PDO::PARAM_INT);
    $sql->bindValue(5, $burns , PDO::PARAM_INT);
    $sql->bindValue(6, $statut , PDO::PARAM_STR);
    $sql->bindValue(7, $desCourte , PDO::PARAM_STR);
    $sql->bindValue(8, $descLongue , PDO::PARAM_STR);
    $sql->bindValue(9, $etapes , PDO::PARAM_STR);
    $sql->execute();
}
function deleteRecetteWithId($id)
{
    $bdd = getConnextionBD();
    $sql = $bdd -> prepare( 'DELETE FROM RECETTE WHERE id = ?');
    $sql->bindValue( 1 , $id , PDO::PARAM_INT);
    $sql->execute();
}

function getRecetteByName($name)
{
    $bdd = getConnextionBD();
    $sql = $bdd -> prepare( 'SELECT * FROM RECETTE WHERE name= ?');
    $sql->bindValue( 1 , $name , PDO::PARAM_STR);
    $sql->execute();
    return $sql->fetchAll();
}

function addBurns($id)
{
    $bdd = getConnextionBD();
    $sql =  $bdd -> prepare ('UPDATE RECETTE SET burns=burns+1 WHERE id = ?;');
    $sql->bindValue( 1 , $id , PDO::PARAM_INT);
    $sql ->execute();
}
function getNameByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['name'];
    }
}
function getTmpsPrepByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['tmpsPrep'];
    }
}
function getTmps_CuissonByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['tmps_cuisson'];
    }
}
function getDifficulteByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['difficulte'];
    }
}
function getBurnsByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['burns'];
    }
}
function getStatutByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['statut'];
    }
}
function getDesCourteByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['desCourte'];
    }
}
function getDesLongueByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['desLongue'];
    }
}
function getEtapeByRequest($Array){
    foreach ($Array as $row )
    {
        return $row['etapes'];
    }
}