<?php  
    //Registrar usuario siempre y cuando recibamos todo lo necesario
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if ($pass1 != $pass2){
        //volver al formulario de registro
        header('Location: ./register_form_controller.php');

    }else{
         //registrar usuario
        require_once "../model/AccesoBD.class.php";
        $bd = new AccesoBD();
        $result = $bd->registrarUsuario($name, $mail, $pass1);
        header('Location: ../index.php');
    }




?>