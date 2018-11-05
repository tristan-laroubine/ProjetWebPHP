<?php
require_once('Views/View.php');
class ControllerFormGestion
{
    public function modifUser()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade'] < 100) {
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idModifUser'])) {
            $idModifUser = htmlspecialchars(filter_input(INPUT_POST, 'idModifUser'));

        } else {
            var_dump("exeption");
            die;
        }

        if (isset($_POST['mdpUser']) AND !empty($_POST['mdpUser'])) {
            if (strlen($_POST['mdpUser']) > 10 AND strlen($_POST['mdpUser']) < 32) {
                $mdpUser = htmlspecialchars(filter_input(INPUT_POST, 'mdpUser'));
                GestionUser::setMdpById($idModifUser, $mdpUser);
            } else {
                $_SESSION['erreur'] = "Le mot de passe n'est pas valide ";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }

        if (isset($_POST['nameUser'])) {
            if (strlen($_POST['nameUser'])>0){
                $nameUser = htmlspecialchars(filter_input(INPUT_POST, 'nameUser'));
            GestionUser::setNameById($idModifUser, $nameUser);
        } else {
                $_SESSION['erreur'] = "L'username n'est pas valide";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
        }
    }

        if (isset($_POST['gradeUser'])){
            if($_POST['gradeUser']>=1 AND $_POST['gradeUser']<=100 ){
            $gradeUser = htmlspecialchars(filter_input(INPUT_POST, 'gradeUser'));
            GestionUser::setGradeById($idModifUser,$gradeUser);
        }else {
            $_SESSION['erreur'] = "Le grade doit être compris entre 1 et 100";
            header('Location: http://tristan-info.alwaysdata.net/Gestion');
            exit();
        }
        }
        if (isset($_POST['emailUser'])) {
            if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['emailUser'])) {
                $emailUser = htmlspecialchars(filter_input(INPUT_POST, 'emailUser'));
                GestionUser::setEmailById($idModifUser, $emailUser);
            } else {
                $_SESSION['erreur'] = "L'email n'est pas valide";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }


        if (isset($_POST['recupUser'])) {
            if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['recupUser'])) {
                $recupUser = htmlspecialchars(filter_input(INPUT_POST, 'recupUser'));
                GestionUser::setRecupById($idModifUser, $recupUser);
            } else {
                $_SESSION['erreur'] = "L'email de récupération n'est pas valide";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }


        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }
    public function deleteUser()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idModifUser'])){
            $idModifUser = htmlspecialchars(filter_input(INPUT_POST, 'idModifUser'));
            GestionUser::deleteUserWithId($idModifUser);
        }else{
            var_dump("exeption");die;
        }

        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }


    public function deleteIngredient()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idModifIngredient'])){
            $idModifIngredient = htmlspecialchars(filter_input(INPUT_POST, 'idModifIngredient'));
            GestionIngredient::deleteIngredientWithId($idModifIngredient);
        }else{
            var_dump("exeption");die;
        }

        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }
    public function modifIngredient()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifierIngredient = null;

        if (isset($_POST['idModifIngredient'])){
            $idModifierIngredient = htmlspecialchars(filter_input(INPUT_POST, 'idModifIngredient'));

        }else{
            var_dump("exeption");die;
        }

        if (isset($_POST['nameIngredient'])){
            if(strlen($_POST['nameIngredient'])<=0)
            {
                $_SESSION['erreur']="le nom de l'ingrédient ne peut pas être vide";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
            if (GestionIngredient::getIngredientByName($_POST['nameIngredient']) == true) {
                $_SESSION['erreur']="L'ingrédient existe déjà";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
            $nameIngredient = htmlspecialchars(filter_input(INPUT_POST, 'nameIngredient'));
            GestionIngredient::setNameById($idModifierIngredient,$nameIngredient);
        }


        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }


    public function modifCompo()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idRecette'])) {
            if (GestionRecette::getRecetteById($_POST['idRecette']) != false) {
                $idRecette = htmlspecialchars(filter_input(INPUT_POST, 'idRecette'));
            } else {
                $_SESSION['erreur']="L'id recette donné n'existe pas";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }


        if (isset($_POST['idIngredient'])) {
            if (GestionIngredient::getIngredientById($_POST['idIngredient']) != false) {
                $idIngredient = htmlspecialchars(filter_input(INPUT_POST, 'idIngredient'));
            } else {
                $_SESSION['erreur']="L'id ingredient donné n'existe pas";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }
        if (isset($_POST['quantite'])) {
            if ($_POST['quantite'] <= 0) {
                $quantite = htmlspecialchars(filter_input(INPUT_POST, 'quantite'));
            } else {
                $_SESSION['erreur']="La quantité donnée n'est pas valide";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }

        if (isset($_POST['type_quantite'])) {
            if (strlen($_POST['type_quantite']) <=0) {
                $type_quantite = htmlspecialchars(filter_input(INPUT_POST, 'type_quantite'));
            } else {
                $_SESSION['erreur']="le type de la quantité n'est pas valide";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }

        GestionCompose::deleteComposeWithIds($idRecette,$idIngredient);
        GestionCompose::addCompose($idRecette,$idIngredient,$quantite,$type_quantite);
        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }
    public function deleteCompo()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idRecette'])){
            $idRecette = htmlspecialchars(filter_input(INPUT_POST, 'idRecette'));

        }else{
            var_dump("exeption");die;
        }

        if (isset($_POST['idIngredient'])){
            $idIngredient = htmlspecialchars(filter_input(INPUT_POST, 'idIngredient'));
        }else{
            var_dump("exeption");die;
        }
        GestionCompose::deleteIngredientWithIdRAndIdI($idRecette,$idIngredient);

        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }


    public function deleteCree()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idModifCree'])){
            $idModifCree = htmlspecialchars(filter_input(INPUT_POST, 'idModifCree'));
           GestionRecette::deleteCreeById($idModifCree);
        }else{
            $_SESSION['erreur']="id Cree invalide";
            header('Location: http://tristan-info.alwaysdata.net/Gestion');
            exit();
        }

        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }
    public function modifCree()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifierCree = null;

        if (isset($_POST['idModifCree'])){
            $idModifierCree = htmlspecialchars(filter_input(INPUT_POST, 'idModifCree'));

        }else{
            var_dump("exeption");die;
        }

        if (isset($_POST['idUserModifCree'])) {
            if (GestionUser::getUserById($_POST['idUserModifCree']) != false) {
                $idUserModifCree = htmlspecialchars(filter_input(INPUT_POST, 'idUserModifCree'));
                GestionRecette::setIdUserById( $idUserModifCree,$idModifierCree);
            } else {
                $_SESSION['erreur']="l'id user n'existe pas";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }

        if (isset($_POST['idRecetteModifCree'])) {
            if (GestionRecette::getRecetteById($_POST['idRecetteModifCree']) != false) {
                $idRecetteModifCree = htmlspecialchars(filter_input(INPUT_POST, 'idRecetteModifCree'));
                GestionRecette::setIdRecetteById($idRecetteModifCree, $idModifierCree);
            } else {
                $_SESSION['erreur']="l'id recette n'existe pas";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }


        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }


    public function deleteFavoris()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;

        if (isset($_POST['idModifFavoris'])){
            $idDeleteFavoris = htmlspecialchars(filter_input(INPUT_POST, 'idModifFavoris'));
            GestionFavoris::deleteFavorisWithId($idDeleteFavoris);
        }else{
            var_dump("exeption");die;
        }

        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }
    public function modifFavoris()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifUser = null;
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }
        $idModifierCree = null;

        if (isset($_POST['idModifFavoris'])){
            $idModifFavoris = htmlspecialchars(filter_input(INPUT_POST, 'idModifFavoris'));

        }else{
            var_dump("exeption");die;
        }

        if (isset($_POST['idUserModifFavoris'])) {
            if (GestionUser::getUserById($_POST['idUserModifFavoris']) != false) {
                $idUserModifFavoris = htmlspecialchars(filter_input(INPUT_POST, 'idUserModifFavoris'));
                GestionFavoris::setIdUserById($idModifFavoris, $idUserModifFavoris);
            } else {
                $_SESSION['erreur']="l'id user n'existe pas";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }

        if (isset($_POST['idRecetteModifFavoris'])) {
            if (GestionRecette::getRecetteById($_POST['idRecetteModifFavoris']) != false) {
                $idRecetteModifFavoris = htmlspecialchars(filter_input(INPUT_POST, 'idRecetteModifFavoris'));
                GestionFavoris::setRecetteById($idModifFavoris, $idRecetteModifFavoris);
            } else {
                $_SESSION['erreur']="l'id recette n'existe pas";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }


        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }


    public function ModifierPagination()
    {
        if (!isset($_SESSION['id']))
        {
            header('Location: /viewError/erreur/1');
            exit();
        }

        if ($_SESSION['grade']<100){
            header('Location: /viewError/erreur/1');
            exit();
        }





        if (isset($_POST['nbPagination'])) {
            if (is_numeric($_POST['nbPagination']) AND $_POST['nbPagination']>= 1 AND $_POST['nbPagination']<=10 ) {
                $nbPagination = htmlspecialchars(filter_input(INPUT_POST, 'nbPagination'));
                GestionDataWeb::setPagination($nbPagination);
                header('Location: http://tristan-info.alwaysdata.net/Gestion');

                exit();
            }else{
                $_SESSION['erreur']="La pagination doit être un chiffre compris entre 1 et 9";
                header('Location: http://tristan-info.alwaysdata.net/Gestion');
                exit();
            }
        }

        header('Location: /viewError/erreur/3');
        exit();
    }
}
