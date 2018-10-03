<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 10:04
 */

function ConnextionBD()
{
    $host = 'mysql-tristan-info.alwaysdata.net';
    $baseName = 'tristan-info_root';
    $user = '167519';
    $mdp = 'root';
    try {
        $bdd = new PDO('mysql:host=mysql-tristan-info.alwaysdata.net;dbname=tristan-info_root', '167519', 'root');
    } catch (Exception $e) {
        die('Erreur Coonnextion BD : ' . $e->getMessage());
    }
}
?>