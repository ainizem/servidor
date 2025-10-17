<?php


//registrar usuario siempre y cuando recibamos lo necesario

$username=$_POST['username'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];


if($pass != $pass2){
//volver al form de registro
    echo($pass);
    echo($pass2);
    header('Location:../index.php?s=registro');
}else{
//registrar user
    require_once "../model/AccesoBD.class.php";//el import dond queramos
    $bd=new AccesoBD();
    $bd->registrarUsuario($username, $mail,$pass); //el controller queda limpio porque la consulta no se hace aqui

    echo"Todo bien, se registra";
}



?>