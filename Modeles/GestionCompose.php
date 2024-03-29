<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 09/10/18
 * Time: 14:26
 */
require_once 'ConnexionBD.php';
Class GestionCompose
{
    /** ajoute un tuple dans la table COMPOSE de la base de données
     * @param $idRecette id de la recette,$idIngredient id de l'ingrédient,$quantite quantité de l'ingredient,
     * $type_quantite type de quantité de l'ingrédient (kg, g, L etc)
     * @return array
     */
    public static function addCompose($idRecette,$idIngredient,$quantite,$type_quantite)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare(' INSERT INTO  COMPOSE ( id_recette,id_ingredient,quantite,type_quantite) VALUES (?,?,?,?) ');
        $sql->bindValue(1, $idRecette , PDO::PARAM_INT);
        $sql->bindValue(2, $idIngredient , PDO::PARAM_INT);
        $sql->bindValue(3, $quantite , PDO::PARAM_INT);
        $sql->bindValue(4, $type_quantite , PDO::PARAM_STR);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    /** Renvoie un tuple de la table COMPOSE en fonction de l'id de la recette et de l'ingrédient
     * @param $idIngredient id de l'ingrédient, $idRecette id de la recette
     * @return array
     */
    public static function getComposeByIdRAndIdI($idRecette,$idIngredient)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( ' SELECT * FROM COMPOSE WHERE id_recette=? AND id_ingredient=?');
        $sql->bindValue( 1 , $idRecette , PDO::PARAM_INT);
        $sql->bindValue( 2 , $idIngredient , PDO::PARAM_INT);
        try{
            $sql->execute();
            $sql->rowCount() or die('Pas de résultat -getComposeByIdRAndIdI'.PHP_EOL);
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }
    /** Supprime un tuple de la table COMPOSE en fonction de l'id de la recette et de l'ingrédient
     * @param $idIngredient id de l'ingrédient, $idRecette id de la recette
     * @return array
     */
    public static function deleteIngredientWithIdRAndIdI($idRecette,$idIngredient)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM COMPOSE  WHERE id_recette=? AND id_ingredient=?');
        $sql->bindValue( 1 , $idRecette , PDO::PARAM_INT);
        $sql->bindValue( 2 , $idIngredient , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    /** Renvoie tous tuple de la table COMPOSE en fonction de l'id
     * @param $id id du tuple
     * @return array
     */
    public static function getAllIngredientsById($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM INGREDIENT I,COMPOSE C WHERE C.id_recette= ? AND I.id=C.id_ingredient');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }

    public static function showIngredientsByRecette($idR,$nameR)
    {
        $ingredients=GestionCompose::getAllIngredientsById($idR);
        echo '<h1> '.$nameR .'</h1>';
        foreach ($ingredients as $row)
        {
            echo '<li>'.$row['name']. '</li>';
        }
    }
    /** Supprime un tuple de la table COMPOSE en fonction son id
     * @param $id du tuple
     */
    public static function deleteComposeWithIdIngr($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM COMPOSE WHERE id_ingredient = ?');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    /** Renvoie tous les tuple de la table COMPOSE
     * @return array
     */
    public static function getAllComposes()
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM COMPOSE');
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetchAll();

    }
    public static function deleteComposeWithIds($id_recette,$id_ingredient)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM COMPOSE WHERE id_ingredient = ? AND id_recette = ?');
        $sql->bindValue( 1 , $id_ingredient , PDO::PARAM_INT);
        $sql->bindValue( 2 , $id_recette , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }


}