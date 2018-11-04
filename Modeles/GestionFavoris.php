<?php
/**
 * Created by PhpStorm.
 * User: m17015514
 * Date: 22/10/18
 * Time: 14:04
 */
require_once 'ConnexionBD.php';
class GestionFavoris
{
    public static function addFavori($idUser, $idRecette)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare(' INSERT INTO  FAVORIS ( id_user,id_recette) VALUES (:idUser,:idRecette) ');
        $sql->bindValue('idUser', $idUser, PDO::PARAM_INT);
        $sql->bindValue('idRecette', $idRecette, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }

    public static function getFavoriByIdUAndIdR($idUser, $idRecette)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare(' SELECT * FROM FAVORIS WHERE id_user=:idUser AND id_recette=:idRecette');
        $sql->bindValue('idUser', $idUser, PDO::PARAM_INT);
        $sql->bindValue('idRecette', $idRecette, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetch();
    }

    public static function getFavoriByIdUser($id_User)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare(' SELECT * FROM FAVORIS WHERE id_user=:idUser');
        $sql->bindValue('idUser',$id_User, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }

    public static function getFavoriById($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare(' SELECT * FROM FAVORIS WHERE id=:id');
        $sql->bindValue('id', $id, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

        return $sql->fetchAll();
    }

    public static function deleteFavorisWithIdUserAndIdRecette($idUser, $idRecette)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare('DELETE FROM FAVORIS  WHERE id_user=:idUser AND id_recette=:idRecette');
        $sql->bindValue('idUser', $idUser, PDO::PARAM_INT);
        $sql->bindValue('idRecette', $idRecette, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function getAllFavoris()
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare(' SELECT * FROM FAVORIS');
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