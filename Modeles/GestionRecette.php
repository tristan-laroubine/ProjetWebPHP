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
        $sql =  $bdd -> prepare('INSERT INTO RECETTE ( name, tmpsPrep,tmps_cuisson, difficulte, burns,statut,desCourte,desLongue,etapes, date15Burns ) VALUES (?,?,?,?,?,?,?,?,?,NULL ) ');
        $sql->bindValue(1, $name , PDO::PARAM_STR);
        $sql->bindValue(2, $tmpsPrep , PDO::PARAM_INT);
        $sql->bindValue(3, $tmps_cuisson , PDO::PARAM_INT);
        $sql->bindValue(4, $difficulte , PDO::PARAM_INT);
        $sql->bindValue(5, $burns , PDO::PARAM_INT);
        $sql->bindValue(6, $statut , PDO::PARAM_STR);
        $sql->bindValue(7, $desCourte , PDO::PARAM_STR);
        $sql->bindValue(8, $descLongue , PDO::PARAM_STR);
        $sql->bindValue(9, $etapes , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function deleteRecetteWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM RECETTE WHERE id = ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql1 = $bdd -> prepare( 'DELETE FROM COMPOSE WHERE id_recette = ?');
        $sql1->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql1->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql2 = $bdd -> prepare( 'DELETE FROM FAVORIS WHERE id_recette = ?');
        $sql2->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql2->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql3 = $bdd -> prepare( 'DELETE FROM CREE WHERE idRecette = ?');
        $sql3->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql3->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


    }

    public static function getRecetteById($id)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('SELECT * FROM RECETTE WHERE id = ?;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }
    public static function getRecetteByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM RECETTE WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        try {
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }
    public static function getIdByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT id FROM RECETTE WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getIdByName'.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch()['id'];
    }

    public static function addBurns($id,$id_user)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET burns=burns+1 WHERE id = ?;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        $sql1 =  $bdd -> prepare ('INSERT INTO BURNS(id_recette,id_user) VALUES (?;?)');
        $sql1->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql1->bindValue( 2 , $id_user , PDO::PARAM_INT);
        try{
            $sql1->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        $sql2 = $bdd -> prepare('SELECT burns FROM RECETTE WHERE id = ? ;');
        $sql2->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql2->execute();
            $sql2->rowCount() or die('Pas de résultat -addBurns'.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        $result= $sql2->fetch()['burns'];
        echo $result;
        if($result==15)
        {
            echo 'ok';
            self::setDate12BurnsById($id,date("Y-m-d"));
        }
    }
    public static function setDate12BurnsById($id,$date)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET date15Burns=? WHERE id=?');
        $sql->bindValue( 1 , $date,PDO::PARAM_STR );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    public static function setNameById($id,$name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET name=? WHERE id=?');
        $sql->bindValue( 1 , $name );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setTmpsPrepById($id,$tmpsPrep)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET tmpsPrep=? WHERE id=?');
        $sql->bindValue( 1 , $tmpsPrep );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setTmps_cuissonById($id,$tmps_cuisson)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET tmps_cuisson=? WHERE id=?');
        $sql->bindValue( 1 , $tmps_cuisson );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setDifficulteById($id,$difficulte)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET difficulte=? WHERE id=?');
        $sql->bindValue( 1 , $difficulte );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setBurnsById($id,$burns)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET burns=? WHERE id=?');
        $sql->bindValue( 1 , $burns );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setStatutByID($id,$statut)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET statut=? WHERE id=?');
        $sql->bindValue( 1 , $statut );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setDesCourteById($id,$desCourte)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET desCourte=? WHERE id=?');
        $sql->bindValue( 1 , $desCourte );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setDesLongueById($id,$desLongue)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET desLongue=? WHERE id=?');
        $sql->bindValue( 1 , $desLongue );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setEtapesById($id,$etapes)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE RECETTE SET etapes=? WHERE id=?');
        $sql->bindValue( 1 , $etapes );
        $sql->bindValue( 2 , $id );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function getAllIngredientsByName($name)
    {
        $bdd = getConnextionBD();
        $id=self::getIdByName($name);
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT I,COMPOSE C WHERE C.id_recette= ? AND I.id=C.id_ingredient');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getAllIngredientsByName'.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }
    public static function getRecetteByOrderDate()
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT id FROM RECETTE ORDER BY date15Burns DESC');
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getRecetteByOrderDate'.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }
    public static function isNameIsUse($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM RECETTE WHERE name = ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


        if ($sql->fetch() != null)
        {
            return true;
        }
        return false;
    }
    public static function addCREE($idUser, $idRecette)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('INSERT INTO CREE ( idRecette, idUser ) VALUES (?,?) ');
        $sql->bindValue(1, $idRecette , PDO::PARAM_INT);
        $sql->bindValue(2, $idUser , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function getIdsRecettesCREE($idUser)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('SELECT idRecette FROM CREE WHERE idUser = ?');
        $sql->bindValue(1, $idUser , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }
    public static function getAllRecette()
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('SELECT * FROM RECETTE');
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }
    public static function isPutBurns($idUser,$idRecette)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('SELECT * FROM BURNS WHERE id_user = ? AND id_recette = ?');
        $sql->bindValue(1, $idUser , PDO::PARAM_INT);
        $sql->bindValue(2, $idRecette , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetch();
    }
    public static function getAllBurns()
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('SELECT * FROM BURNS');
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return ($sql->fetchAll());
    }

    public static function getAllCrees()
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('SELECT * FROM CREE');
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return ($sql->fetchAll());
    }

}


