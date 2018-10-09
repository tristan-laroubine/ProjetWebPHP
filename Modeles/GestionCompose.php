<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 09/10/18
 * Time: 14:26
 */

Class GestionCompose
{
    public static function addCompose($idRecette,$idIngredient,$quantite,$type_quantite)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare(' INSERT INTO  COMPOSE ( id_recette,id_ingredient,quantite,type_quantite) VALUES (?,?,?,?) ');
        $sql->bindValue(1, $idRecette , PDO::PARAM_INT);
        $sql->bindValue(2, $idIngredient , PDO::PARAM_INT);
        $sql->bindValue(3, $quantite , PDO::PARAM_INT);
        $sql->bindValue(4, $type_quantite , PDO::PARAM_STR);
        $sql->execute();
    }
    public static function getComposeByIdRAndIdI($idRecette,$idIngredient)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( ' SELECT * FROM COMPOSE WHERE id_recette=? AND id_ingredient=?');
        $sql->bindValue( 1 , $idRecette , PDO::PARAM_INT);
        $sql->bindValue( 2 , $idIngredient , PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch();
    }
    public static function deleteIngredientWithIdRAndIdI($idRecette,$idIngredient)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM COMPOSE  WHERE id_recette=? AND id_ingredient=?');
        $sql->bindValue( 1 , $idRecette , PDO::PARAM_INT);
        $sql->bindValue( 2 , $idIngredient , PDO::PARAM_INT);
        $sql->execute();
    }
}