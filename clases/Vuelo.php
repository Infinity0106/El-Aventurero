<?php
class Vuelo{
    //attributos
    private $nombre;
    private $num_de_vuelo;
    private $hora_salida;
    private $hora_llegada;
    private $lugar_de_salida;
    private $lugar_de_llegada;
    private $precio;

    //metodo
    function __construct(&$data){
        $this->nombre=$data[0];
        $this->num_de_vuelo=$data[1];
        $this->hora_salida=$data[2];
        $this->hora_llegada=$data[3];
        $this->lugar_de_salida=$data[4];
        $this->lugar_de_llegada=$data[5];
        $this->precio=$data[6];
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($data){
        $this->nombre = $data;
    }
    public function getNumVuelo(){
        return $this->num_de_vuelo;
    }
    public function setNumVuelo($data){
        $this->num_de_vuelo = $data;
    }
    public function getHoraSalida(){
        return $this->hora_salida;
    }
    public function setHoraSalida($data){
        $this->hora_salida = $data;
    }
    public function getHoraLlegada(){
        return $this->hora_llegada;
    }
    public function setHoraLlegada($data){
        $this->hora_llegada = $data;
    }
    public function getLugarSalida(){
        return $this->lugar_de_salida;
    }
    public function setLugarSalida($data){
        $this->lugar_de_salida = $data;
    }
    public function getLugarLlegada(){
        return $this->lugar_de_llegada;
    }
    public function setLugarLlegada($data){
        $this->lugar_de_llegada = $data;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($data){
        $this->precio = $data;
    }
}
?>