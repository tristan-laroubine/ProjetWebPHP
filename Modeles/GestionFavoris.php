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
    /** ajoute une recette et un utilisateur dans la table FAVORI de la base de données
     * @param $idUser id de l'utilisateur, $idRecette id de la recette
     * @return array
     */
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
    /** Renvoie une recette de la liste des favoris en fonction d'un id d'utilisateur et de recette
     * @param $idUser id d'un utilisateur, $idRecette id d'une recette
     * @return array
     */
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

    /** Renvoie les favoris d'un utilisateur en fonction de son id
     * @param $id_User id de l'utilisateur
     * @return array
     */
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
    /** Renvoie un favori tuple de la table FAVORIS de la base de données en fonction de son id
     * @param $name nom de l'ingrédient
     * @return array
     */
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
    /** Supprime un tuple de la table FAVORIS en fonction du nom d'utilisateur et de la recette
     * @param $idUser id de l'utilisateur, $idRecette id de la recette
     */
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

    public static function deleteFavorisWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare('DELETE FROM FAVORIS  WHERE idFavoris = ?');
        $sql->bindValue(1, $id, PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    /** Renvoie tous les tuples de la table FAVORIS de la base de données
     * @return array
     */
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
    public static function setIdUserById($id,$id_user)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE FAVORIS SET idUser = ? WHERE id=?');
        $sql->bindValue( 1 , $id_user,PDO::PARAM_INT );
        $sql->bindValue( 2 , $id ,PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


    }
    public static function setRecetteById($id,$id_recette)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE FAVORIS SET idRecette=? WHERE id=?');
        $sql->bindValue( 1 , $id_recette,PDO::PARAM_INT );
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