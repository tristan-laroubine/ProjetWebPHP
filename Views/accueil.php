<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 09:45
 */

//require "../Modeles/ConnexionBD.php";

require "../Modeles/GestionUser.php";
echo 'I"m alive';
foreach (getUserById(1)as $row)
{
    echo 'test';
}
foreach (getUserByNameAndPassword("root","root")as $row)
{
    echo '<br/><br/>JE SUIS CONNECTER';
}

echo 'Grade : '.intIsConnect("root","root");
addUser("test","test",1,"test","test");
foreach (getUserById(2)as $row)
{
    echo 'test';
}