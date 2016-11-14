<?php
session_start();
require_once('clases/Ciudad.php');
$nombres=array(
    "Cancún"=>'Cancun',
    "Cd. de Mexico"=>'Cd. de mexico',
    "Los cabos"=>'Los cabos',
    "Puerto Vallarta"=>'Puerto vallarta',
);
if(!file_exists("./file/".$nombres[$_POST['ciudad']].".txt")){
    header('Location: index.php');
}

$txtFile = fopen("./file/".$nombres[$_POST['ciudad']].".txt", "r");
$ciudad = new Ciudad();
$objeto = array();
$fotos = array();
$comentarios = array();

$ciudad->setNombre(fgets($txtFile));
$globalString = fgets($txtFile);
while(!feof($txtFile)){

    if($globalString=="FOTO".PHP_EOL){
        $globalString = fgets($txtFile);
        while($globalString!="END_FOTO".PHP_EOL){
            $ciudad->addFoto(explode("|",$globalString));
            $globalString = fgets($txtFile);
        }
    }
    if($globalString=="HOTEL".PHP_EOL){
        $globalString = fgets($txtFile);
        while($globalString!="END_HOTEL".PHP_EOL){
            for($i=0;$i<5;$i++){
                array_push($objeto, substr($globalString,12));
                $globalString = fgets($txtFile);
            }
            if($globalString=="fotos:[".PHP_EOL){
                $globalString = fgets($txtFile);
                while($globalString!="]".PHP_EOL){
                    array_push($fotos,explode('|',$globalString));
                    $globalString = fgets($txtFile);
                }
                array_push($objeto,$fotos);
            }
            $globalString = fgets($txtFile);
            if($globalString=="comentarios:[".PHP_EOL){
                $globalString = fgets($txtFile);
                while($globalString!="]".PHP_EOL){
                    array_push($comentarios,explode('|',$globalString));
                    $globalString = fgets($txtFile);
                }
                array_push($objeto,$comentarios);
            }
            $ciudad->addHotel($objeto);
            unset($objeto);
            $objeto=array();
            unset($fotos);
            $fotos=array();
            unset($comentarios);
            $comentarios=array();
            $globalString = fgets($txtFile);
            if($globalString==PHP_EOL){
                $globalString = fgets($txtFile);
            }
        }
    }
    if($globalString=="VUELO".PHP_EOL){
        $globalString = fgets($txtFile);
        while($globalString!="END_VUELO".PHP_EOL){
            for($i=0;$i<7;$i++){
                switch ($i) {
                    case 2:
                        array_push($objeto, date("Y-m-d H:i:s", strtotime('+5 hours')));
                        break;
                    case 3:
                        array_push($objeto, date("Y-m-d H:i:s", strtotime('+8 hours')));
                        break;

                    default:
                        array_push($objeto, substr($globalString,20));
                        break;
                }
                $globalString = fgets($txtFile);
            }
            $ciudad->addVuelo($objeto);
            unset($objeto);
            $objeto=array();
            if($globalString==PHP_EOL){
                $globalString = fgets($txtFile);
            }
        }
    }
    if($globalString=="RESTAURANTE".PHP_EOL){
        $globalString = fgets($txtFile);
        while($globalString!="END_RESTAURANTE".PHP_EOL){
            for($i=0;$i<4;$i++){
                array_push($objeto, substr($globalString,16));
                $globalString = fgets($txtFile);
            }
            if($globalString=="fotos:[".PHP_EOL){
                $globalString = fgets($txtFile);
                while($globalString!="]".PHP_EOL){
                    array_push($fotos,explode('|',$globalString));
                    $globalString = fgets($txtFile);
                }
                array_push($objeto,$fotos);
            }
            $globalString = fgets($txtFile);
            if($globalString=="comentarios:[".PHP_EOL){
                $globalString = fgets($txtFile);
                while($globalString!="]".PHP_EOL){
                    array_push($comentarios,explode('|',$globalString));
                    $globalString = fgets($txtFile);
                }
                array_push($objeto,$comentarios);
            }
            $ciudad->addRestaurante($objeto);
            unset($objeto);
            $objeto=array();
            unset($fotos);
            $fotos=array();
            unset($comentarios);
            $comentarios=array();
            $globalString = fgets($txtFile);
            if($globalString==PHP_EOL){
                $globalString = fgets($txtFile);
            }
        }
    }
    if($globalString=="ATRACCION".PHP_EOL){
        $globalString = fgets($txtFile);
        while($globalString!="END_ATRACCION".PHP_EOL){
            for($i=0;$i<5;$i++){
                array_push($objeto, substr($globalString,16));
                $globalString = fgets($txtFile);
            }
            if($globalString=="fotos:[".PHP_EOL){
                $globalString = fgets($txtFile);
                while($globalString!="]".PHP_EOL){
                    array_push($fotos,explode('|',$globalString));
                    $globalString = fgets($txtFile);
                }
                array_push($objeto,$fotos);
            }
            $globalString = fgets($txtFile);
            if($globalString=="comentarios:[".PHP_EOL){
                $globalString = fgets($txtFile);
                while($globalString!="]".PHP_EOL){
                    array_push($comentarios,explode('|',$globalString));
                    $globalString = fgets($txtFile);
                }
                array_push($objeto,$comentarios);
            }
            $ciudad->addAtraccion($objeto);
            unset($objeto);
            $objeto=array();
            unset($fotos);
            $fotos=array();
            unset($comentarios);
            $comentarios=array();
            $globalString = fgets($txtFile);
            if($globalString==PHP_EOL){
                $globalString = fgets($txtFile);
            }
        }
    }
    //compare enter
    //if($tmp==PHP_EOL)

    $globalString = fgets($txtFile);
}
fclose($txtFile);
//echo $ciudad->getNombre();
//echo '<pre>'; print_r($ciudad); echo '</pre>';
$_SESSION['ciudad']=$ciudad;
unset($ciudad);
unset($objeto);
unset($fotos);
unset($comentarios);
header('Location: infoCiudad.php');
?>