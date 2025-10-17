<?php

class User
{
    private $username;
    private $mail;
    private $rol;
    private $permisos; //array 

    public function __construct($username, $mail, Rol $rol)
    {
        $this->username = $username;
        $this->mail = $mail;
        $this->rol = $rol;
    }

    //getters
    public function getUsername()
    {
        return $this->username;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function getPermisos()
    {
        return $this->permisos;
    }
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;
    }

}
