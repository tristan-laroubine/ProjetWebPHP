<?php
/**
 * Created by PhpStorm.
 * User: f17007588
 * Date: 08/10/18
 * Time: 16:49
 */
require_once 'ConnexionBD.php';

class GestionDataWeb
{
    public static function getValueDataWeb1()
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('SELECT * FROM DataWeb WHERE id = 1');
         try{
            $sql->execute();
        }
        catch (PDOException $e)
        {
            exit();
        }
        return $sql->fetch();
    }
    public static function setPagination($nbOfPagination)
    {
        $bdd = getConnextionBD();
        $sql =  $bdd -> prepare('UPDATE DataWeb SET paginationIndex=? WHERE id=1');
        $sql->bindValue( 1 , $nbOfPagination, PDO::PARAM_INT );
        try{
            $sql->execute();
        }catch (PDOException $e)
        {
            exit();
        }

    }

}


