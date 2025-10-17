<?php 

class User{
    private $name;
    private $mail;

    public function __construct($name,$mail){
        $this->name = $name; //setName($name);
        $this->mail = $mail; //setMail($mail);

    }
    //getters
    public function getName(){
        return $this->name;
    }

    public function getMail(){
        return $this->mail;
    }

}