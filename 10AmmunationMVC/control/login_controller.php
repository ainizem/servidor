<?php

    require_once "../model/User.class.php";
    require_once "../model/AccesoBD.class.php";

    $mail = $_POST['mail'];
    $pass =md5($_POST['pass']);

    $bd = new AccesoBD();

    $user = $bd->getUser($mail,$pass); //ahora: O es NULL o está lleno
    session_start(); //Crear / obtener sesión
    if ($user==null){
        //volver al formulario de login
        $_SESSION['tipo_mensaje']="danger";
        $_SESSION['mensaje']="Las credenciales son incorrectas";
        header('Location: login_form_controller.php');
    }else{
        $_SESSION['user'] = $user;
        $_SESSION['tipo_mensaje']="success";
        $_SESSION['mensaje']="Has iniciado sesión correctamente";
        header('Location: ../index.php');
    }
        





?>