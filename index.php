<?php
require_once('Controleurs/Rooter.php');
session_start();
$rooter = new Rooter();
$rooter->routeReq();

