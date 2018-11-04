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
        <h1>Pannel Administrateur</h1>
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
                                    '<td>'.$row['bruns'].'</td>'.
                                    '<td>'.$row['statu'].'</td>'.
                                    '<td>'.$row['DesCourte'].'</td>'.
                                    '<td>'.$row['DesLongues'].'</td>'.
                                    '<td>'.$row['etapes'].'</td>'.
                                    '<td>'.$row['date15Burns'].'</td>'.
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
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
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
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
                <div class="col-md-12">
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
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
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
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
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
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
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
                                    '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                            }
                            ?>



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">

                    <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                    <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
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

</script>