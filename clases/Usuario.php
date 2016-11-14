<?php

class Usuario{
    //atributos
    private $nombre;
    private $email;
    private $contraseña;

    //metodos
    function __construct($info){
        $data = explode("|",$info);
        $nombre=$data[0];
        $email=$data[1];
        $contraseña=$data[2];
    }
    public function getNombre(){
        return $nombre;
    }
    public function setNombre($data){
        $nombre=$data;
    }
    public function getMail(){
        return $email;
    }
    public function setMail($data){
        $email=$data;
    }
    public function getContraseña(){
        return $contraseña;
    }
    public function setContraseña($data){
        $contraseña=$data;
    }
}


?>