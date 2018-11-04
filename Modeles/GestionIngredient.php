<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 09/10/18
 * Time: 14:14
 */
require_once 'Modeles/ConnexionBD.php';

Class GestionIngredient
{
    public static function addIngredient($name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('INSERT INTO  INGREDIENT ( name ) VALUES (?) ');
        $sql->bindValue(1, $name , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function deleteIngredientWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM INGREDIENT WHERE id = ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql1 = $bdd -> prepare( 'DELETE FROM COMPOSE WHERE id_ingredient = ?');
        $sql1->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql1->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    public static function getIngredientByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getIngredientByName'.PHP_EOL);
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
        $sql = $bdd -> prepare( 'SELECT id FROM INGREDIENT WHERE name= ?');
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
    public static function getIngredientById($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT WHERE id= ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getIngredientById '.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }
    public static function getAllIngredients()
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT ORDER BY name ASC');
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getAllIngredients'.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }
    public static function setNameById($id,$name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE INGREDIENT SET name=? WHERE id=?');
        $sql->bindValue( 1 , $name,PDO::PARAM_STR );
        $sql->bindValue( 2 , $id ,PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


    }
}
