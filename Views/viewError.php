<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 09/10/18
 * Time: 14:28
 */

?>
    <div class="likeFooter">
        <br/>
        <br/>
    </div>
    <div class="container">
        <h1>Une erreur est survenu</h1>
<?php
    if ($data['erreur']==1)
    {
        echo "<h2>Pour acceder ici vous devez êtres connecter</h2>";
    }
if ($data['erreur']==2)
{
    echo "<h2>Page introuvable</h2>";
}
if ($data['erreur']==3)
{
    echo "<h2>Vous ne pouvez pas acceder à cette page</h2>";
}
    ?>
    </div>