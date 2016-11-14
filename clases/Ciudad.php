<?php
require_once('Atraccion.php');
require_once('Hotel.php');
require_once('Restaurante.php');
require_once('Vuelo.php');
class Ciudad{
    //atributos
    private $nombre;
    private $fotos = array();
    private $hoteles = array();
    private $vuelos = array();
    private $restaurantes = array();
    private $atracciones = array();

    //metodo
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($data){
        $this->nombre = $data;
    }


    public function addHotel(&$data){
        $this->hoteles[] = new Hotel($data);
    }
    public function getHotelID($n){
        return $this->hoteles[$n];
    }
    public function getHotel(){
        return $this->hoteles;
    }
    public function delHotel($n){
        unset ($this->hoteles[$n]);
    }
    public function sizeHotel(){
        return count($this->hoteles);
    }

    public function addFoto(&$data){
        $this->fotos[] = new Foto($data);
    }
    public function getFotoID($n){
        return $this->fotos[$n];
    }
    public function getFoto(){
        return $this->fotos;
    }
    public function delFoto($n){
        unset ($this->fotos[$n]);
    }
    public function sizeFoto(){
        return count($this->fotos);
    }


    public function addVuelo(&$data){
        $this->vuelos[] = new Vuelo($data);
    }
    public function getVueloID($n){
        return $this->vuelos[$n];
    }
    public function getVuelo(){
        return $this->vuelos;
    }
    public function delVuelo($n){
        unset ($this->vuelos[$n]);
    }

    
    public function addRestaurante(&$data){
        $this->restaurantes[] = new Restaurante($data);
    }
    public function getRestauranteID($n){
        return $this->restaurantes[$n];
    }
    public function getRestaurante(){
        return $this->restaurantes;
    }
    public function delRestaurante($n){
        unset ($this->restaurantes[$n]);
    }


    public function addAtraccion(&$data){
        $this->atracciones[] = new Atraccion($data);
    }
    public function getAtraccionID($n){
        return $this->atracciones[$n];
    }
    public function getAtraccion(){
        return $this->atracciones;
    }
    public function delAtraccion($n){
        unset ($this->atracciones[$n]);
    }
}
?>