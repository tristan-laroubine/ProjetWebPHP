<?php
	session_start();
    $this->_t = "Profil";

    if(isset($_POST['deco'])){
    	session_destroy();
    	header("Location: index");
    }

    if(isset($_POST['changeMail']))
    {
        header("Location:ChangeMail");
    }

    if(isset($_POST['changeMdp']))
    {
        header("Location:ChangeMdp");
    }

    if(isset($_POST['favRec']))
    {
        header("Location:RecetteFav");
    }
    ?>

</div>
</div>
</div>
</div>

<?php 
	echo '<center><h1>'. 'Profil de : ' .$_SESSION['pseudo'] . '</h1></center>';
?>
<div class="contact-form">
	<form action="" method="post">

        <center/><input type="submit" name="favRec" value="Mes recettes favorites">
        <input type="submit" name="changeMail" value="Changer mon adresse mail">
        <input type="submit" name="changeMdp" value="Changer mon mot de passe">
    <br/><br/><input type="submit" name="deco" value="Me Déconnecter"></center>
	</form>
</div>