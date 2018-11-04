<?php
require_once('Views/View.php');
class ControllerFormGestion
{
    public function index()
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

        header('Location: http://tristan-info.alwaysdata.net/Gestion');
        exit();
    }
}
