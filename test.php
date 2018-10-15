<?php
require_once "Modeles/ConnexionBD.php";
echo $_POST['mdp'];

$bdd = getConnextionBD();
$sql =  $bdd -> prepare ('SELECT * FROM USER WHERE name="test" and mdp="'. $_POST['mdp'].'";');
//$sql =  $bdd -> prepare ('SELECT * FROM USER WHERE name="test" and mdp="1" OR 1=1;');
$sql->execute();
$user = $sql->fetch();
echo '<br/>'.$user['recup'].' <-- recup';
?>

