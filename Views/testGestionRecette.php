<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 08/10/18
 * Time: 17:02
 */

require_once "../Modeles/GestionRecette.php";

//addRecette('Filet mignon',10,10,5,5,'PASFINI','Fizrfzzrfzr','TEST','tozfezz');
//deleteRecetteWithId(3);

$result = getRecetteByName('Filet mignon');
if(!empty($result))
{
    echo 'name : '.getNameByRequest($result).'<br>';
    echo 'tmpsPremp : '.getTmpsPrepByRequest($result).'<br>';
    echo 'tmps_cuisson : '.getTmps_CuissonByRequest($result).'<br>';
    echo 'difficulte : '.getDifficulteByRequest($result).'<br>';
    echo 'statut : '.getStatutByRequest($result).'<br>';
    echo 'desCourte : '.getDesCourteByRequest($result).'<br>';
    echo 'desLongue : '.getDesLongueByRequest($result).'<br>';
    echo ' etapes : '.getEtapeByRequest($result).'<br>';
}else
{
    echo 'rien';
}

