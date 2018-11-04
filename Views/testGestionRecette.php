<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 08/10/18
 * Time: 17:02
 */

require_once "../Modeles/GestionRecette.php";
require_once "../Modeles/GestionIngredient.php";
require_once "../Modeles/GestionCompose.php";
//GestionRecette::addRecette('Grillade de poulet',10 ,10 ,10 ,5,'public','Grillade de poulet au cidre et aux épices','Grillade de poulet au cidre et aux épicesGrillade de poulet au cidre et aux épicesGrillade de poulet au cidre et aux épices',' ÉTAPE 1Avec un couteau, incisez les côtes d agneau afin de les farcir.
//
//    ÉTAPE 2Au mortier, écrasez 1 c. à soupe de sauge avec la gousse d ail et 1/2 c. à café de sel.
//
//    ÉTAPE 3A l obtention d\'une purée, ajoutez 2 c. à soupe d huile d olive, le jus d un citron, 1 c. à soupe de sauge ciselée, les 2 c. à soupe de romarin ciselé, du poivre du moulin et la pancetta finement émincée.
//
//    ÉTAPE 4Insérez dans les fentes des côtes d\'agneau, puius faites griller les cotes au barbecue.');
//deleteRecetteWithId(3);

//GestionIngredient::addIngredient('cotes d\' agneau');
//GestionIngredient::addIngredient(' pancetta en tranches');
//GestionIngredient::addIngredient('soupe de sauge');
//GestionIngredient::addIngredient('gousse d\'ail');
//GestionIngredient::addIngredient('jus d\'un citron frais');
//GestionIngredient::addIngredient('huile d\'olive');
//GestionIngredient::addIngredient('soupe de romarin frais');
//GestionIngredient::addIngredient('sel');
//GestionIngredient::addIngredient('poivre du moulin');
//GestionCompose::addCompose(GestionRecette::getIdByName('Grillade de poulet'),GestionIngredient::getIdByName('cotes d\' agneau'),12,'unité');
$resulte=GestionRecette::getAllIngredientsById(2);
foreach ($resulte as $row)
{
    echo $row['name'].'<br>';
}
//GestionCompose::addCompose(2,2,55,'grammes');
//$resulte=GestionRecette::getRecetteById(8);
//    echo 'IDR : ' . $resulte['name'] . "\t";
