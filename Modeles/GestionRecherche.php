<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 08/10/18
 * Time: 16:49
 */
require_once 'ConnexionBD.php';

class GestionRecherche
{
    public static function getRecetteWithDataInName($data,$connecter)
    {
        $bdd = getConnextionBD();
        $data = "%".$data."%";
        if( $connecter == true ){
            $sql =  $bdd -> prepare('SELECT * FROM RECETTE WHERE name like ? AND statut LIKE \'public\' ');
        }
        else{
            $sql =  $bdd -> prepare('SELECT * FROM RECETTE WHERE name like ? AND RECETTE.burns >= 10  AND statut LIKE \'public\' ');
        }

        $sql->bindValue(1, $data , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetchAll();
    }
    public static function getRecetteWithDataInDesc($data,$connecter)
    {
        $bdd = getConnextionBD();
        $data = "%".$data."%";

        if( $connecter == true ){
            $sql =  $bdd -> prepare('SELECT * FROM RECETTE WHERE RECETTE.desCourte like ? AND statut LIKE \'public\' ');
            $sql->bindValue(1, $data , PDO::PARAM_STR);
        }
        else{
            $sql =  $bdd -> prepare('SELECT * FROM RECETTE WHERE RECETTE.burns >= 10 AND RECETTE.desLongue like ?  AND statut LIKE \'public\' ');
            $sql->bindValue(1, $data , PDO::PARAM_STR);
        }

        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetchAll();
    }
    public static function getRecetteWithDataInEtape($data,$connecter)
    {
        $bdd = getConnextionBD();
        $data = "%".$data."%";
        if( $connecter == true ){
            $sql =  $bdd -> prepare('SELECT * FROM RECETTE WHERE RECETTE.etapes like ?  AND statut LIKE \'public\' ');
        }
        else{
            $sql =  $bdd -> prepare('SELECT * FROM RECETTE WHERE RECETTE.etapes like ? AND RECETTE.burns > 10  AND statut LIKE \'public\' ');

        }
        $sql->bindValue(1, $data , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetchAll();
    }
}


