<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 08/10/18
 * Time: 16:49
 */
require_once 'ConnexionBD.php';

class GestionRecette
{
    public static function addRecette($name, $tmpsPrep, $tmps_cuisson, $difficulte, $burns,$statut,$desCourte,$descLongue,$etapes)
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
    public static function deleteRecetteWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM RECETTE WHERE id = ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql->execute();
    }
    public static function deleteRecetteWithName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM RECETTE WHERE name = ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->execute();
    }
    public static function getRecetteById($id)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('SELECT * FROM RECETTE WHERE id = ?;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch();
    }
    public static function getRecetteByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM RECETTE WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetch();
    }
    public static function getIdByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT id FROM RECETTE WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetch()['id'];
    }

    public static function addBurns($id)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET burns=burns+1 WHERE id = ?;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql ->execute();
    }


    public static function setNameById($id,$name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET name=? WHERE id=?');
        $sql->bindValue( 1 , $name );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setTmpsPrepById($id,$tmpsPrep)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET tmpsPrep=? WHERE id=?');
        $sql->bindValue( 1 , $tmpsPrep );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setTmps_cuissonById($id,$tmps_cuisson)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET tmps_cuisson=? WHERE id=?');
        $sql->bindValue( 1 , $tmps_cuisson );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setDifficulteById($id,$difficulte)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET difficulte=? WHERE id=?');
        $sql->bindValue( 1 , $difficulte );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setBurnsById($id,$burns)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET burns=? WHERE id=?');
        $sql->bindValue( 1 , $burns );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setStatutByID($id,$statut)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET statut=? WHERE id=?');
        $sql->bindValue( 1 , $statut );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setDesCourteById($id,$desCourte)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET desCourte=? WHERE id=?');
        $sql->bindValue( 1 , $desCourte );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setDesLongueById($id,$desLongue)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET desLongue=? WHERE id=?');
        $sql->bindValue( 1 , $desLongue );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function setEtapesById($id,$etapes)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET etapes=? WHERE id=?');
        $sql->bindValue( 1 , $etapes );
        $sql->bindValue( 2 , $id );
        $sql->execute();
    }
    public static function getAllIngredientsById($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT I,COMPOSE C WHERE C.id_recette= ? AND I.id=C.id_ingredient');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll();
    }
    public static function getAllIngredientsByName($name)
    {
        $bdd = getConnextionBD();
        $id=self::getIdByName($name);
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT I,COMPOSE C WHERE C.id_recette= ? AND I.id=C.id_ingredient');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll();
    }
}

