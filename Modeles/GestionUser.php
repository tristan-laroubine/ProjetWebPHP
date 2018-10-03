<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 11:29
 */
require "ConnexionBD.php";
function isConnect( $user, $pass)
{
    $bdd = getConnextionBD();
    $sql =  'SELECT * FROM USER ';
    foreach ($bdd-> query($sql) as $row)
    {
        print $row['id']."\t";
        print $row['name']."\t";
    }
}
