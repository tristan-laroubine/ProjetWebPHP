<?php
$this->_t = 'Cook And Burn';
session_start();
if (isset($_SESSION['id']))
{
    echo '<h1>BONJOURS</h1>';
}else{
    echo '<h6>NTM</h6>';
}