<?php

require_once "../model/Permiso.class.php";
require_once "../model/Rol.class.php";
require_once "../model/User.class.php";
require_once "../model/AccesoBD.class.php";

$username = $_POST['username'];
$pass = md5($_POST['pass']);

$bd = new AccesoBD();
$user = $bd->getUser($username, $pass);
session_start();

if ($user == null) {
    $_SESSION['flash'] = "Credenciales incorrectas";
    $_SESSION['flash-type'] = "danger";
    header('Location: ../index.php?s=login');
} else {

    $_SESSION['user'] = $user;
    $_SESSION['rol'] = $user->getRol()->getRolName();

    //Arreglar esto:
    $permisosObjs = $user->getPermisos();   
    $permisos = array_map(function ($permiso) {
        return $permiso->getPermisoName();
    }, $permisosObjs);
    $_SESSION['permisos'] = implode(", ", $permisos);

    $_SESSION['flash'] = "Has iniciado sesión correctamente como " . $_SESSION['rol'] . ". Permisos " . $_SESSION['permisos'];
    //Revisar permisos
    $_SESSION['flash-type'] = "success";
    header('Location: ../index.php');
}
