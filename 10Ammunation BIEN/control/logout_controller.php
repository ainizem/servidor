<?php
require_once "../model/User.class.php";
session_start();
$name = $_SESSION['user']->getUsername();
session_unset(); //limpieza (valdría en este caso)
//session_destroy(); //destrucción (valdría en todos los casos)

$_SESSION['flash'] = "Hasta pronto, $name";
$_SESSION['flash-type'] = "info";
header('Location: ../index.php');
