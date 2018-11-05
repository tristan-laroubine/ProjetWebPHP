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

    /** ajoute un ingrédient dans la table INGREDIENT de la base de données
     * @param $name nom de l'ingrédient
     */
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

    /** Supprime un ingrédient de la base de données en fonction de son id
     * @param $id id de l'ingrédient
     */
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
    /** renvoie un ingrédient en fonction de son nom
     * @param $name nom de l'ingrédient
     * @return array
     */
    public static function getIngredientByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT WHERE name= ?');
        $sql->bindValue( 1 , $name , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }
    /** Renvoie l'id d'un ingrédient en fonction de son nom
     * @param $name nom de l'ingrédient
     * @return array
     */
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
    /** Renvoie un ingrédient en fonction de son id
     * @param $id id de l'ingrédient
     * @return array
     */
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
    /** Renvoie tous les ingrédients contenus dans la table INGREDIENT de la base de données
     * @return array
     */
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

    /** Modifie le nom d'un ingrédient en fonction de son id
     * @param $name nom de l'ingrédient, $id id de l'ingrédient
     */
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
