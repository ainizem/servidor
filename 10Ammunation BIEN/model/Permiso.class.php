<?php

class Permiso {
    private $id;
    private $permiso;

    public function __construct($permiso,$id) {
        $this->permiso = $permiso; 
        $this->id = $id; 
    }

    //getters
    public function getPermisoId() {
        return $this->id;
    }
    public function getPermisoName() {
        return $this->permiso;
    }

    
}


?>