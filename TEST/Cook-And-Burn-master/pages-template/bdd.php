<?php

$servername = "mysql-ivax.alwaysdata.net";
$username = "ivax";
$password = "XAluhu2620!";
$dbname = "ivax_login";


    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>