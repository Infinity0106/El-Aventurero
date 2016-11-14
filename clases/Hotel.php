<?php
require_once('Foto.php');
require_once('Comentario.php');

class Hotel{
    //attributos
    private $nombre;
    private $direccion;
    private $telefono;
    private $estrellas;
    private $precio;
    private $foto = array();
    private $comentario = array();
    //metodos
    function __construct(&$data){
        $this->nombre=$data[0];
        $this->direccion=$data[1];
        $this->telefono=$data[2];
        $this->estrellas=$data[3];
        $this->precio=$data[4];
        foreach ($data[5] as $key => $value) {
            array_push($this->foto, new Foto($value));
        }
        foreach ($data[6] as $key => $value) {
            array_push($this->comentario, new Comentario($value));
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($data){
        $this->nombre = $data;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($data){
        $this->direccion = $data;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($data){
        $this->telefono = $data;
    }
    public function getEstrellas(){
        return $this->estrellas;
    }
    public function setEstrellas($data){
        $this->estrellas = $data;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($data){
        $this->precio = $data;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($url, $titulo){
        $this->foto->setUrl($url);
        $this->foto->setTitulo($titulo);
    }
    public function sizeComentario(){
        return count($this->comentario);
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function setComentario($autor, $text){
        $this->comentario->setAutor($autor);
        $this->comentario->setTexto($text);
    }

}
?>