<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 09/10/18
 * Time: 14:14
 */

Class GestionIngredient
{
    public static function addIngredient($name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('INSERT INTO  INGREDIENT ( name ) VALUES (?) ');
        $sql->bindValue(1, $name , PDO::PARAM_STR);
        $sql->execute();
    }
    public static function deleteIngredientWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM INGREDIENT WHERE id = ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql->execute();
    }
    public static function deleteIngredientWithName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM INGREDIENT WHERE name = ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->execute();
    }

    public static function getIngredientByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetch();
    }
    public static function getIdByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT id FROM INGREDIENT WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetch()['id'];
    }
    public static function getIngredientById($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT WHERE id= ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch();
    }
    public static function setNameById($id,$name)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE INGREDIENT SET name=? WHERE id=?');
        $sql->bindValue( 1 , $name,PDO::PARAM_STR );
        $sql->bindValue( 2 , $id ,PDO::PARAM_INT);
        $sql->execute();
    }
}
