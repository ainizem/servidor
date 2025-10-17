<?php 

//1. contactar con el modelo (BBDD ---> getProductos('rifles'));

    //$rifles = $bd->getProductos('rifles');
    $rifles = array();
    $rifles[0] = "AK-47";
    $rifles[1] = "M4";
    $rifles[2] = "Groza";

//2. vista
    $contenido = 'rifles';
    require_once '../index.php';

