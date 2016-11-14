<?php

class Foto{
    //atributos
    private $url;
    private $titulo;

    //metodos
    function __construct(&$data){
        $this->url = $data[0];
        $this->titulo = $data[1];
    }
    public function getUrl(){
        return $this->url;
    }
    public function setUrl($data){
        $this->url = $data;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($data){
        $this->titulo = $data;
    }
}


?>