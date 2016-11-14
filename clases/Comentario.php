<?php
class Comentario{
    //atrivutos
    private $autor;
    private $texto;

    //metodos
    function __construct(&$data){
        $this->autor = $data[0];
        $this->texto = $data[1];
    }
    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($data){
        $this->autor = $data;
    }
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($data){
        $this->texto = $data;
    }
}
?>