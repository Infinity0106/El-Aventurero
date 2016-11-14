<?php
require_once('Foto.php');
require_once('Comentario.php');

class Restaurante{
    //atributos
    private $nombre;
    private $descripcion;
    private $lugar;
    private $estrellas;
    private $comentario=array();
    private $foto=array();
    //metodos
    function __construct(&$data){
        $this->nombre=$data[0];
        $this->descripcion=$data[1];
        $this->lugar=$data[2];
        $this->estrellas=$data[3];
        foreach ($data[4] as $key => $value) {
            array_push($this->foto, new Foto($value));
        }
        foreach ($data[5] as $key => $value) {
            array_push($this->comentario, new Comentario($value));
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($data){
        $this->nombre = $data;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($data){
        $this->descripcion = $data;
    }
    public function getLugar(){
        return $this->lugar;
    }
    public function setLugar($data){
        $this->lugar = $data;
    }
    public function getEstrellas(){
        return $this->estrellas;
    }
    public function setEstrellas($data){
        $this->estrellas = $data;
    }
    public function sizeComentario(){
        return count($this->comentario);
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function setComentario($data){
        $this->comentario = $data;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($data){
        $this->foto = $data;
    }
}

?>