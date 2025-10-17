<?php 
    require_once "../model/User.class.php";
    session_start();
    $name=$_SESSION['user']->getName();
    session_unset(); //Limpieza (valdría, porque se carga al user)
    //session_destroy(); //destrucción (vale en todos los casos)

    $_SESSION['tipo_mensaje']="info";
    $_SESSION['mensaje']="Hasta pronto $name";
    header('Location: ../index.php');



    




?>