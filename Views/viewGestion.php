<?php
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 01/11/2018
 * Time: 20:51
 */
//echo '<pre>';var_dump($data);die;
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="likeFooter">
    <br/>
</div>

<div class="container">
    <div class="row">
        <?php
        if(isset($_SESSION['erreur']))
        {
            echo'<h3 style="color: red;">'. $_SESSION['erreur'].'</h3>';
            unset($_SESSION['erreur']);
        } ?>
        <h1>Panel Administrateur</h1>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#recette" aria-expanded="false" aria-controls="recette">
            Les recettes
        </button>

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users">
            Les Utilisateurs
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ingredients" aria-expanded="false" aria-controls="ingredients">
            Les Ingredients
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#burns" aria-expanded="false" aria-controls="burns">
            Les Burns
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#composes" aria-expanded="false" aria-controls="composes">
            Les Compositions
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#crees" aria-expanded="false" aria-controls="crees">
            Les Crées
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#favoris" aria-expanded="false" aria-controls="favoris">
            Les Favoris
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#gestionWEB" aria-expanded="false" aria-controls="gestionWEB">
            Aspect du Site
        </button>

        <!--        MODAL INGREDIENT -->
        <div class="collapse" id="editIngredient">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Modifier Ingredient</h4>
                    </div>
                    <div class="modal-body">
                        <form class="modal-body" method="post" id="modifIngredient" action="/FormGestion/modifIngredient">
                            <input class="form-control " type="text" name="idModifIngredient" style="display: none" id="idModifIngredient">
                            <input class="form-control " type="text" name="nameIngredient" id="nameModifIngredient" placeholder="Name Ingredient" >
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>

                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL INGREDIENT FIN-->
        <!--        MODAL DELETE INGREDIENT-->
        <div class="collapse" id="deleteIngredient">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <button class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#deleteIngredient"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title custom_align" id="Heading">Suppression</h4>
                    </div>
                    <form class="modal-body" method="post" id="modifIngredient" action="/FormGestion/deleteIngredient">
                        <input class="form-control " type="text" id="idDeleteIngredient" name="idModifIngredient" style="display: none"
                               id="idDeleteIngredient">

                        <div class="modal-body">

                            <div class="alert alert-daidModifIngredientnger"><span
                                        class="glyphicon glyphicon-warning-sign"></span> Êtes vous sûr de vouloir
                                supprimer le tuple ?
                            </div>

                        </div>

                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Yes
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span> No
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL DELETE INGREDIENT FIN-->

        <!--        MODAL Compo -->
        <div class="collapse" id="editCompo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Modifier Composition</h4>
                    </div>
                    <div class="modal-body">
                        <form class="modal-body" method="post" id="modifCompo" action="/FormGestion/modifCompo">
                            <input class="form-control " type="text" name="idRecette"  id="idRecetteModifCompo">
                            <input class="form-control " type="text" name="idIngredient"  id="idIngredientModifCompo">
                            <input class="form-control " type="text" name="quantite"  id="quantiteModifCompo">
                            <input class="form-control " type="text" name="type_quantite" id="type_quantiteModifCompo" placeholder="Name Compo" >
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>

                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL Compo FIN-->
        <!--        MODAL DELETE Compo-->
        <div class="collapse" id="deleteCompo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <button class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#deleteCompo"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title custom_align" id="Heading">Suppression</h4>
                    </div>
                    <form class="modal-body" method="post" id="modifCompo" action="/FormGestion/deleteCompo">
                        <input class="form-control " type="text" id="idRecetteDeleteCompo" name="idRecette" style="display: none"
                               id="idDeleteCompo">
                        <input class="form-control " type="text" id="idIngredientDeleteCompo" name="idIngredient" style="display: none"
                               id="idDeleteCompo">

                        <div class="modal-body">

                            <div class="alert alert-daidModifIngredientnger"><span
                                        class="glyphicon glyphicon-warning-sign"></span> Êtes vous sûr de vouloir
                                supprimer le tuple ?
                            </div>

                        </div>

                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Yes
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span> No
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL DELETE Compo FIN-->

        <!--        MODAL CREE -->
        <div class="collapse" id="editCree">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Modifier Crée</h4>
                    </div>
                    <div class="modal-body">
                        <form class="modal-body" method="post" id="modifCree" action="/FormGestion/modifCree">
                            <input class="form-control " type="text" name="idModifCree" style="display: none" id="idModifCree">
                            <input class="form-control " type="text" name="idUserModifCree"  id="idUserModifCree">
                            <input class="form-control " type="text" name="idRecetteModifCree"  id="idRecetteModifCree">
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>

                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL CREE FIN-->
        <!--        MODAL DELETE CREE-->
        <div class="collapse" id="deleteCree">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <button class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#deleteCree
                                    aria-hidden="true"></button>
                            <h4 class="modal-title custom_align" id="Heading">Suppression</h4>
                    </div>
                    <form class="modal-body" method="post" id="modifCree" action="/FormGestion/deleteCree">
                        <input class="form-control " type="text" id="idDeleteCree" name="idModifCree" style="display: none">

                        <div class="modal-body">

                            <div class="alert alert-daidModifIngredientnger"><span
                                        class="glyphicon glyphicon-warning-sign"></span> Êtes vous sûr de vouloir
                                supprimer le tuple ?
                            </div>

                        </div>

                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Yes
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span> No
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL DELETE CREE FIN-->

        <!--       MODAL Favoris -->
        <div class="collapse" id="editFavoris">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Modifier Favoris</h4>
                    </div>
                    <div class="modal-body">
                        <form class="modal-body" method="post" id="modifCree" action="/FormGestion/modifFavoris">
                            <input class="form-control " type="text" name="idModifFavoris" style="display: none" id="idModifFavoris">
                            <input class="form-control " type="text" name="idUserModifFavoris"  id="idUserModifFavoris">
                            <input class="form-control " type="text" name="idRecetteModifFavoris"  id="idRecetteModifFavoris">
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>

                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL Favoris FIN-->
        <!--        MODAL DELETE Favoris-->
        <div class="collapse" id="deleteFavoris">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <button class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#deleteFavoris
                                    aria-hidden="true"></button>
                        <h4 class="modal-title custom_align" id="Heading">Suppression</h4>
                    </div>
                    <form class="modal-body" method="post" id="modifFavoris" action="/FormGestion/deleteFavoris">
                        <input class="form-control " type="text" id="idDeleteFavoris" name="idModifFavoris" style="display: none" >

                        <div class="modal-body">

                            <div class="alert alert-daidModifIngredientnger"><span
                                        class="glyphicon glyphicon-warning-sign"></span> Êtes vous sûr de vouloir
                                supprimer le tuple ?
                            </div>

                        </div>

                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Yes
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span> No
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--        MODAL DELETE Favoris FIN-->



        <div class="collapse" id="recette">
            <div class="card card-body">
                <div class="col-md-12">
                    <h4>Table recette :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Temps de préparation</th>
                            <th>Temps de cuisson</th>
                            <th>Difficulté</th>
                            <th>Burns</th>
                            <th>Status</th>
                            <th>Description Courte</th>
                            <th>Description Longue</th>
                            <th>Etapes</th>
                            <th>Date du 15 Burns</th>
                            </thead>
                            <tbody>
                            <?php
                            $recettes = $data['recettes'];
                            foreach ($recettes as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id'].'</td>'.
                                    '<td>';
                                if(isset($row['name'])) {
                                    echo($row['name']);
                                }
                                echo '</td>'.
                                    '<td>'.$row['tmpsPrep'].'</td>'.
                                    '<td>'.$row['tmps_cuisson'].'</td>'.
                                    '<td>'.$row['difficulte'].'</td>'.
                                    '<td>'.$row['burns'].'</td>'.
                                    '<td>'.$row['statut'].'</td>'.
                                    '<td>'.$row['desCourte'].'</td>'.
                                    '<td>'.$row['desLongue'].'</td>'.
                                    '<td>'.$row['etapes'].'</td>'.
                                    '<td>'.$row['date15Burns'].'</td>'.
                                    '<td><button onclick="modifRecette('.$row['id'].')" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="users">
            <div class="card card-body">
                <div class="col-md-12">
                    <h4>Table Utilisateur :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Grade</th>
                            <th>Email</th>
                            <th>Email de récupération</th>
                            </thead>
                            <tbody>
                            <?php
                            $users = $data['users'];
                            foreach ($users as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id'].'</td>'.
                                    '<td>';
                                if(isset($row['name'])) {
                                    echo($row['name']);
                                }
                                echo '</td>'.
                                    '<td>'.$row['grade'].'</td>'.
                                    '<td>'.$row['email'].'</td>'.
                                    '<td>'.$row['recup'].'</td>'.
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormModifUser('<?php echo $row['id'];?>','<?php echo $row['name'];?>','<?php echo $row['grade'];?>','<?php echo $row['email'];?>','<?php echo $row['recup'];?>')"<?php echo'class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#editUser" aria-expanded="false" aria-controls="editUser"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormDeleteUser('<?php echo $row['id'];?>')"<?php echo'class="btn btn-danger btn-xs" data-toggle="collapse" data-target="#deleteUser" aria-expanded="false" aria-controls="deleteUser"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }

                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="ingredients">
            <div class="card card-body">
                <div class="col-md-12">
                    <h4>Table Ingredients :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>

                            <th>ID</th>
                            <th>Nom</th>
                            </thead>
                            <tbody>
                            <?php
                            $temp = $data['ingredients'];
                            foreach ($temp as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id'].'</td>'.
                                    '<td>'.$row['name'].'</td>'.
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormModifIngredient('<?php echo $row['id'];?>','<?php echo $row['name'];?>')"<?php echo'class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#editIngredient" aria-expanded="false" aria-controls="editIngredient"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormDeleteIngredient('<?php echo $row['id'];?>')"<?php echo'class="btn btn-danger btn-xs" data-toggle="collapse" data-target="#deleteIngredient" aria-expanded="false" aria-controls="deleteIngredient"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="burns">
            <div class="card card-body">
                <div class="col-md-12">modal1
                    <h4>Table Burns :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>ID Recette</th>
                            <th>ID User</th>
                            </thead>
                            <tbody>
                            <?php
                            $burns = $data['burns'];
                            foreach ($burns as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id_recette'].'</td>'.
                                    '<td>'.$row['id_user'].'</td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="composes">
            <div class="card card-body">
                <div class="col-md-12">
                    <h4>Table Compose :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>ID Recette</th>
                            <th>ID Ingredient</th>
                            <th>Quantite</th>
                            <th>Type de quantite</th>
                            </thead>
                            <tbody>
                            <?php
                            $temp = $data['composes'];
                            foreach ($temp as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id_recette'].'</td>'.
                                    '<td>'.$row['id_ingredient'].'</td>'.
                                    '<td>'.$row['quantite'].'</td>'.
                                    '<td>'.$row['type_quantite'].'</td>'.
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormModifCompo('<?php echo $row['id_recette'];?>','<?php echo $row['id_ingredient'];?>','<?php echo $row['quantite'];?>','<?php echo $row['type_quantite'];?>')"<?php echo'class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#editCompo" aria-expanded="false" aria-controls="editCompo"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormDeleteCompo('<?php echo $row['id_recette'];?>','<?php echo $row['id_ingredient'];?>')"<?php echo'class="btn btn-danger btn-xs" data-toggle="collapse" data-target="#deleteCompo" aria-expanded="false" aria-controls="deleteCompo"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="crees">
            <div class="card card-body">
                <div class="col-md-12">
                    <h4>Table Cree :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>ID</th>
                            <th>ID User</th>
                            <th>ID Recette</th>
                            </thead>
                            <tbody>
                            <?php
                            $temp = $data['crees'];
                            foreach ($temp as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id'].'</td>'.
                                    '<td>'.$row['idUser'].'</td>'.
                                    '<td>'.$row['idRecette'].'</td>'.
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormModifCree('<?php echo $row['id'];?>','<?php echo $row['idUser'];?>','<?php echo $row['idRecette'];?>')"<?php echo'class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#editCree" aria-expanded="false" aria-controls="editCree"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormDeleteCree('<?php echo $row['id'];?>')"<?php echo'class="btn btn-danger btn-xs" data-toggle="collapse" data-target="#deleteCree" aria-expanded="false" aria-controls="deleteCree"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="favoris">
            <div class="card card-body">
                <div class="col-md-12">
                    <h4>Table Favoris :</h4>
                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>

                            <th>ID User</th>
                            <th>ID Recette</th>
                            <th>ID</th>
                            </thead>
                            <tbody>
                            <?php
                            $temp = $data['favoris'];
                            foreach ($temp as $row){
                                echo '<tr>'.
                                    '<td><input type="checkbox" class="checkthis" /></td>'.
                                    '<td>'.$row['id_user'].'</td>'.
                                    '<td>'.$row['id_recette'].'</td>'.
                                    '<td>'.$row['idFavoris'].'</td>'.
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormModifFavoris('<?php echo $row['idFavoris'];?>','<?php echo $row['id_user'];?>','<?php echo $row['id_recette'];?>')"<?php echo'class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#editFavoris" aria-expanded="false" aria-controls="editFavoris"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit">';?><button onclick="adapteFormDeleteFavoris('<?php echo $row['idFavoris'];?>')"<?php echo'class="btn btn-danger btn-xs" data-toggle="collapse" data-target="#deleteFavoris" aria-expanded="false" aria-controls="deleteFavoris"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="gestionWEB">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Pagination des recettes</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-group" action="/FormGestion/ModifierPagination">
                            <input class="form-control " type="text" name="nbPagination" value="<?php echo $data['setup']['paginationIndex']?>">
                            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>
                        </form>

                    </div>
                    <div class="modal-footer ">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

    </div>

</div>


<div class="collapse" id="editUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Modifier User</h4>
            </div>
            <form class="modal-body" method="post" id="modifUser" action="/FormGestion/modifUser">
                <div class="form-group">
                    <input class="form-control " type="text" name="idModifUser" style="display: none" id="idModifUser">
                </div>
                <div class="form-group">

                    <input class="form-control " type="password" name="mdpUser" placeholder="Mots de passe">
                    <input class="form-control " type="text" name="nameUser" id="nameModifUser" placeholder="Name User" >
                    <input class="form-control " type="text" name="gradeUser" id="gradeModifUser" placeholder="Grade User" >
                    <input class="form-control " type="text" name="emailUser" id="emailModifUser" placeholder="Email User" >
                    <input class="form-control " type="text" name="recupUser" id="recupModifUser" placeholder="Recup User" >
                </div>
                <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>
            </form>
            <div class="modal-footer ">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="collapse" id="deleteUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><button class="glyphicon glyphicon-remove" data-toggle="collapse" data-target="#deleteUser" aria-hidden="true"></button>
                    <h4 class="modal-title custom_align" id="Heading">Suppression</h4>
            </div>
            <form class="modal-body" method="post" id="modifUser" action="/FormGestion/deleteUser">
                <input class="form-control " type="text" name="idModifUser" style="display: none" id="idDeleteUser">

                <div class="modal-body">

                    <div class="alert alert-daidModifIngredientnger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes vous sûr de vouloir supprimer le tuple ?</div>

                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function adapteFormModifUser($idUser,$name,$grade,$email,$recup){
        var elm = document.getElementById("idModifUser");
        elm.value=$idUser;
        document.getElementById("nameModifUser").value =$name;
        document.getElementById("gradeModifUser").value =$grade;
        document.getElementById("emailModifUser").value =$email;
        document.getElementById("recupModifUser").value =$recup;
    }
    function adapteFormDeleteUser($idUser)
    {

        document.getElementById("idDeleteUser").value =$idUser;
    }

    function adapteFormModifIngredient($idIngredient,$name)
    {
        document.getElementById("idModifIngredient").value =$idIngredient;
        document.getElementById("nameModifIngredient").value =$name;
    }
    function adapteFormDeleteIngredient($idIngredient)
    {
        document.getElementById("idDeleteIngredient").value = $idIngredient;
    }

    function adapteFormModifCompo($idRecette,$idIngredient,$quantite,$type_quantite)
    {
        document.getElementById("idRecetteModifCompo").value =$idRecette;
        document.getElementById("idIngredientModifCompo").value = $idIngredient;
        document.getElementById("quantiteModifCompo").value =$quantite;
        document.getElementById("type_quantiteModifCompo").value =$type_quantite;
    }
    function adapteFormDeleteCompo($idRecette,$idIngredient)
    {
        document.getElementById("idRecetteDeleteCompo").value = $idRecette;
        document.getElementById("idIngredientDeleteCompo").value = $idIngredient;
    }

    function adapteFormModifCree($idCree,$idUser,$idRecette)
    {
        document.getElementById("idModifCree").value =$idCree;
        document.getElementById("idUserModifCree").value =$idUser;
        document.getElementById("idRecetteModifCree").value =$idRecette;
    }
    function adapteFormDeleteCree($idCree)
    {
        document.getElementById("idDeleteCree").value = $idCree;
    }

    function adapteFormModifFavoris($idFavoris,$idUser,$idRecette)
    {
        document.getElementById("idModifFavoris").value =$idFavoris;
        document.getElementById("idUserModifFavoris").value =$idUser;
        document.getElementById("idRecetteModifFavoris").value =$idRecette;
    }
    function adapteFormDeleteFavoris($idFavoris)
    {
        document.getElementById("idDeleteFavoris").value = $idFavoris;
    }
    $(document).ready(function(){
        $("#mytable #checkall").click(function () {
            if ($("#mytable #checkall").is(':checked')) {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });

        $("[data-toggle=tooltip]").tooltip();
    });
    function modifRecette($idrecette) {
        document.location.href="http://tristan-info.alwaysdata.net/ModifierRecette/admin/"+$idrecette
    }

</script>