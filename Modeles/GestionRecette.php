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
    /** Ajoute une recette à la liste des recettes de la base de données
     * @param $name nom de la recette, $tmpsPrep temps de préparation des ingrédients de la recette,
     * $tmps_cuisson temps de cuisson de la recette, $difficulté difficulté, $burns nombre de burns de la recette,
     * $statut statut de la recette (publique, privée etc), $descCourte courte description de la recette,
     * $descLongue description plus longue de la recette, $etapes étapes que comporte la recette
     */
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
    /** Supprime une recette en fonction de l'id fourni
     * @param $id id de la recette
     */
    public static function deleteRecetteWithId($id)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'DELETE FROM RECETTE WHERE id = ?;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql1 = $bdd -> prepare( 'DELETE FROM COMPOSE WHERE id_recette = ?;');
        $sql1->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql1->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql2 = $bdd -> prepare( 'DELETE FROM FAVORIS WHERE id_recette = ?;');
        $sql2->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql2->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        $sql3 = $bdd -> prepare( 'DELETE FROM CREE WHERE idRecette = ?;');
        $sql3->bindValue( 1 , $id , PDO::PARAM_INT);
        try{
            $sql3->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }


    }


    /** Récupère une recette en fonction de son id
     * @param $id id de la recette
     * @return array
     */
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
    /** Renvoie une recette en fonction de son nom
     * @param $name nom de la recette
     * @return array
     */
    public static function getRecetteByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM RECETTE WHERE name= ?;');
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
    /** Renvoie l'id de la recette eb fonction de son nom fourni
     * @param $name nom de la recette
     * @return array
     */
    public static function getIdByName($name)
    {
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT id FROM RECETTE WHERE name= ?;');
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
    /** Ajoute un burn
     * @param $id id de la recette, $id_user id de l'user ayant laissé le burn
     */
    public static function addBurns($id,$id_user)
    {
        $bdd = getConnextionBD();
        $sql = $bdd->prepare('UPDATE RECETTE SET burns=burns+1 WHERE id = ?;');
        $sql->bindValue(1, $id, PDO::PARAM_INT);
        try {
            $sql->execute();
        } catch (PDOException $e) {
            exit();
        }

        $sql1 = $bdd->prepare('INSERT INTO BURNS(id_recette,id_user) VALUES (?,?);');
        $sql1->bindValue(1, $id, PDO::PARAM_INT);
        $sql1->bindValue(2, $id_user, PDO::PARAM_INT);
        try {
            $sql1->execute();
        } catch (PDOException $e) {
            exit();
        }

        $sql2 = $bdd->prepare('SELECT * FROM RECETTE WHERE id = ? ;');
        $sql2->bindValue(1, $id, PDO::PARAM_INT);
        try {
            $sql2->execute();
        } catch (PDOException $e) {
            exit();
        }

        $result = $sql2->fetch()['burns'];
        if ($result == 15) {
            echo 'ok';
            self::setDate12BurnsById($id, date("Y-m-d"));
        }
    }
    /** Modifie la date à laquelle une recette a obtenu 15 burns
     * @param $id id de la recette, $date date à laquelle la recette a obtenu 15 burns
     */
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

    /** Modifie le nom d'une recette en fonction de son id
     * @param $id id de la recette, $name, nom de la recette
     */
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
    /** Modifie le temps de preparation d'une recette en fonction de son id
     * @param $id id de la recette, $tmpsPrep temps de préparation à la recette
     */
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
    /** Modifie le temps de cuisson d'une recette en fonction de son id
     * @param $id id de la recette, $tmps_cuisson temps de cuisson de la recette
     */
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
    /** Modifie la difficulté d'une recette en fonction de son id
     * @param $id id de la recette, $difficulté difficulté de la recette
     */
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
    /** Modifie le nombre de burns d'une recette en fonction de son id
     * @param $id id de la recette, $burns nombre de burns de la recette
     */
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

    /** Modifie le statut d'une recette en fonction de son id
     * @param $id id de la recette, $statut statut de la recette (public, privé etc)
     */
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
    /** Modifie la description courte d'une recette en fonction de son id
     * @param $id id de la recette, $desCourte description courte de la recette
     */
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
    /** Modifie la description longue d'une recette en fonction de son id
     * @param $id id de la recette, $DescLongue description longue de la recette
     */
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
    /** Modifie les étapes que comporte une recette en fonction de son id
     * @param $id id de la recette, $etapes etapes que comporte la recette
     */
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
    /** Renvoie tous les ingredients utilisés dans une recette en fonction de son nom
     * @param $name nom de la recette
     * @return array
     */
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
    /** Renvoie les recettes dans l'ordre decroissant des dates pour lesquelles elles ont obtenu 15 burns
     * @return array
     */
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

    /** Renvoie vrai ou faux selon si le nom d'une recette est déjà utilisé ou non
     * @param $name nom de la recette
     * @return boolean
     */
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

    /** Insère dans la table CREE la recette et l'utilisateur qui l'a créée
     * @param $idRecette id de la recette, $idUser id de l'utilisateur ayant crée la recette
     * @return array
     */
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

    /** Renvoie toutes les recettes créées par un utilisateur en focntion de son id
     * @param $idUser id de l'utilisateur
     * @return array
     */
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

    /** Renvoie toutes les recettes contenues dans la base de données
     * @return array
     */
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

    /** Renvoie vrai ou faux selon si un utilisateur a laissé un burn à une recette en fonction de son id
     * @param $idUser id de l'utilisateur, $idRecette id de la recette
     * @return array
     */
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

    /** Renvoie tous les tuples de la table BURNS de la base de données
     * @return array
     */
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


    /** Renvoie tous les tuples de la table CREE de la base de données
     * @return array
     */
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
    public static function isPrivateById($id){
        $bdd = getConnextionBD();
        $sql = $bdd -> prepare( 'SELECT * FROM RECETTE WHERE id = ? AND statut = "privee" ;');
        $sql->bindValue( 1 , $id , PDO::PARAM_INT);
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
    public static function setIdUserById($id_user,$id)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE CREE SET idUser = ? WHERE id = ?;');
        $sql->bindValue( 1 , $id_user,PDO::PARAM_INT );
        $sql->bindValue( 2 , $id,PDO::PARAM_INT );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function setIdRecetteById($id_recette,$id)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('UPDATE CREE SET idRecette = ? WHERE id = ?;');
        $sql->bindValue( 1 , $id_recette,PDO::PARAM_INT );
        $sql->bindValue( 2 , $id,PDO::PARAM_INT );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }

    }
    public static function deleteCreeById($id){
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare ('DELETE FROM CREE WHERE id = ?;');
        $sql->bindValue( 1 , $id,PDO::PARAM_INT );
        try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
    }
}


