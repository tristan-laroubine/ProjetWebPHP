<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 09:45
 */

//require "../Modeles/ConnexionBD.php";

require "../Modeles/GestionUser.php";
//require_once "../Modeles/GestionRecette.php";

//addUser("test","test","50","tzetez","treet");



$resulte = getUserById(2);

echo 'ID : '.$resulte['id']."\t";
echo '| Name : '.getNameByRequest($resulte)."\t";
echo '| Mdp : '.getMdpByRequest($resulte)."\t";
echo '| Grade : '.getGradeByRequest($resulte)."\t";
echo '| email : '.getEmailByRequest($resulte)."\t";
echo '| recup : '.getRecupByRequest($resulte)."\t";


foreach (getUserByNameAndPassword("root","root")as $row)
{
    echo '<br/><br/>JE SUIS CONNECTER';
}


echo '<br>Grade : '.intIsConnect("root","root");



foreach (getUserById(2)as $row)
{
    echo '<br/>test';
}


//RecupMdpWithEmail('tristan.LAROUBINE@etu.univ-amu.fr');

