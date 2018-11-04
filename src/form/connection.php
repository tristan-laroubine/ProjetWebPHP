<?php
if (isset($_POST['idForm']))
{
    $idForm = protect_input(filter_input(INPUT_POST,'idForm'));
}

if (isset($_POST['mdpForm']) and is_string($_POST['mdpForm']))
{
    $mdpForm = protect_input(filter_input(INPUT_POST,'mdpForm'));
}
function protect_input($value)
{

    $value = htmlspecialchars($value);

    return $value;
}


if ($idForm == 'root')
{
    if ( ! session_id() ) @ session_start();
    $_SESSION['id']=5;
    header('Location: http://tristan-info.alwaysdata.net');
    exit();
}
