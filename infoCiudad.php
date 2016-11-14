<?php

require_once('clases/Ciudad.php');
session_start();
$ciudad = $_SESSION['ciudad'];
echo '<pre>'; print_r($ciudad); echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo '<title>'.$ciudad->getNombre().'</title>'?>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }

    .slide-image {
        width: 100%;
    }

    .carousel-holder {
        margin-bottom: 30px;
    }

    .carousel-control,
    .item {
        border-radius: 4px;
    }

    .caption {
        height: 130px;
        overflow: hidden;
    }

    .caption h4 {
        white-space: nowrap;
    }

    .thumbnail img {
        width: 100%;
    }

    .ratings {
        padding-right: 10px;
        padding-left: 10px;
        color: #d17581;
    }

    .thumbnail {
        padding: 0;
    }

    .thumbnail .caption-full {
        padding: 9px;
        color: #333;
    }
    .half{
        position: relative;
    }
    .half:after {
        content:'';
        position:absolute;
        z-index:1;
        background:white;
        width: 50%;
        height: 100%;
        left: 47%;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="eraseAll.php">El-Aventurero</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="eraseAll.php"><span class="glyphicon glyphicon-search"></span> Nueva busqueda</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead"><?php echo $ciudad->getNombre();?></p>
                <div class="list-group">
                    <?php
                        if(isset($_GET['opt'])&&!empty($_GET['opt'])){
                            switch ($_GET['opt']) {
                                case 1:
                                    echo '
                                    <a href="infoCiudad.php?opt=1" class="list-group-item active">Hoteles</a>
                                    <a href="infoCiudad.php?opt=2" class="list-group-item">Vuelos</a>
                                    <a href="infoCiudad.php?opt=3" class="list-group-item">Restaurantes</a>
                                    <a href="infoCiudad.php?opt=4" class="list-group-item">Atracciones</a>
                                    ';
                                    break;
                                case 2:
                                    echo '
                                    <a href="infoCiudad.php?opt=1" class="list-group-item">Hoteles</a>
                                    <a href="infoCiudad.php?opt=2" class="list-group-item active">Vuelos</a>
                                    <a href="infoCiudad.php?opt=3" class="list-group-item">Restaurantes</a>
                                    <a href="infoCiudad.php?opt=4" class="list-group-item">Atracciones</a>
                                    ';
                                    break;
                                case 3:
                                    echo '
                                    <a href="infoCiudad.php?opt=1" class="list-group-item">Hoteles</a>
                                    <a href="infoCiudad.php?opt=2" class="list-group-item">Vuelos</a>
                                    <a href="infoCiudad.php?opt=3" class="list-group-item active">Restaurantes</a>
                                    <a href="infoCiudad.php?opt=4" class="list-group-item">Atracciones</a>
                                    ';
                                    break;
                                case 4:
                                    echo '
                                    <a href="infoCiudad.php?opt=1" class="list-group-item">Hoteles</a>
                                    <a href="infoCiudad.php?opt=2" class="list-group-item">Vuelos</a>
                                    <a href="infoCiudad.php?opt=3" class="list-group-item">Restaurantes</a>
                                    <a href="infoCiudad.php?opt=4" class="list-group-item active">Atracciones</a>
                                    ';
                                    break;
                            }
                        }
                        else{
                            echo '
                            <a href="infoCiudad.php?opt=1" class="list-group-item">Hoteles</a>
                            <a href="infoCiudad.php?opt=2" class="list-group-item">Vuelos</a>
                            <a href="infoCiudad.php?opt=3" class="list-group-item">Restaurantes</a>
                            <a href="infoCiudad.php?opt=4" class="list-group-item">Atracciones</a>
                            ';
                        }
                    ?>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                    $i=0;
                                    foreach($ciudad->getFoto() as $value){
                                        if($i==0){
                                            echo '
                                            <div class="item active">
                                                <img class="slide-image" src="'.$value->getUrl().'" alt="'.$value->getTitulo().'">
                                            </div>
                                            ';
                                        }
                                        else{
                                            echo '
                                            <div class="item">
                                                <img class="slide-image" src="'.$value->getUrl().'" alt="'.$value->getTitulo().'">
                                            </div>
                                            ';
                                        }
                                        $i++;
                                    }
                                ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>



                <div class="row">
                    
                    <?php
                    if(!isset($_GET['opt']) || (isset($_GET['opt']) && $_GET['opt']==1)){
                        echo'
                        <div class="col-lg-12">
                            <h3 class="page-header"><span class="glyphicon glyphicon-home"></span> Hoteles</h3>
                        </div>
                        ';
                        $i=0;
                        foreach($ciudad->getHotel() as $value){
                            echo '
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="'.$value->getFoto()[0]->getUrl().'"  alt="">
                                    <div class="caption" style="height:auto">
                                        <h4 class="pull-right">'.$value->getPrecio().'</h4>
                                        <h4>
                                            <a href="infoArticulo.php?type=hotel&id='.$i.'"><p style="">'.wordwrap($value->getNombre(), 20, "<br />\n").'</p></a>
                                        </h4>
                                        <p><span class="glyphicon glyphicon-map-marker"></span> '.$value->getDireccion().'</p>
                                        <p><span class="glyphicon glyphicon-earphone"></span> '.$value->getTelefono().'</p>
                                    </div>
                                    <div class="ratings">
                                        <p class="pull-right">'.$value->sizeComentario().' reviews</p>
                                        <p>';
                                        for($j=0;$j< (int)$value->getEstrellas();$j++){
                                            echo '<span class="glyphicon glyphicon-star"></span> ';
                                        }
                                        if(strpos($value->getEstrellas(),'.')!=false){
                                            echo '<span class="glyphicon glyphicon-star half"></span> ';
                                        }
                            echo'
                                        </p>
                                    </div>
                                </div>
                            </div>
                            ';
                            $i++;
                            if($i%3==0){
                                echo '<div class="row"></div>';
                            }
                        }
                    }
                    ?>

                    <?php
                    if(!isset($_GET['opt']) || (isset($_GET['opt']) && $_GET['opt']==2)){
                        echo '
                        <div class="col-lg-12">
                            <h3 class="page-header"><span class="glyphicon glyphicon-globe"></span> Vuelos</h3>
                        </div>
                        ';
                        $i=0;
                        foreach($ciudad->getVuelo() as $value){
                            echo '
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <h4><a href="infoArticulo.php?type=vuelo&id='.$i.'">'.$value->getNombre().'</a>
                                </h4>
                                <p>
                                    <span class="glyphicon glyphicon-plane"></span> '.$value->getLugarSalida().' => '.$value->getLugarLlegada().'<br>
                                    <span class="glyphicon glyphicon-time"></span> '.$value->getHoraSalida().' => '.$value->getHoraLlegada().'<br>
                                </p>
                                <a class="btn btn-primary" href="infoArticulo.php?type=vuelo&id='.$i.'">'.$value->getPrecio().'</a>
                            </div>
                            ';
                            $i++;
                            if($i%3==0){
                                echo '<div class="row"></div>';
                            }
                        }
                    }
                    ?>

                    
                    <?php
                    if(!isset($_GET['opt']) || (isset($_GET['opt']) && $_GET['opt']==3)){
                        echo '
                        <div class="col-lg-12">
                            <h3 class="page-header"><span class="glyphicon glyphicon-cutlery"></span> Restaurantes</h3>
                        </div>
                        ';
                        $i=0;
                        foreach($ciudad->getRestaurante() as $value){
                            echo'
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="'.$value->getFoto()[0]->getUrl().'" alt="">
                                    <div class="caption" style="height: auto">
                                        <h4><a href="infoArticulo.php?type=restaurante&id='.$i.'">'.wordwrap($value->getNombre(), 20, "<br />\n").'</a>
                                        </h4>
                                        <p><span class="glyphicon glyphicon-tags"></span> '.$value->getDescripcion().'</p>
                                    </div>
                                    <div class="ratings">
                                    <p class="pull-right">'.$value->sizeComentario().' reviews</p>
                                        <p>';
                                        for($j=0;$j< (int)$value->getEstrellas();$j++){
                                            echo '<span class="glyphicon glyphicon-star"></span> ';
                                        }
                                        if(strpos($value->getEstrellas(),'.')!=false){
                                            echo '<span class="glyphicon glyphicon-star half"></span> ';
                                        }
                            echo'
                                        </p>
                                    </div>
                                </div>
                            </div>
                            ';
                            $i++;
                            if($i%3==0){
                                echo '<div class="row"></div>';
                            }
                        }
                    }
                    ?>
                    
                    
                    <?php
                    if(!isset($_GET['opt']) || (isset($_GET['opt']) && $_GET['opt']==4)){
                        echo '
                        <div class="col-lg-12">
                            <h3 class="page-header"><span class="glyphicon glyphicon-camera"></span> Atracciones</h3>
                        </div>
                        ';
                        $i=0;
                        foreach($ciudad->getAtraccion() as $value){
                            echo'
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="'.$value->getFoto()[0]->getUrl().'" alt="">
                                    <div class="caption" style="height: auto">
                                        <h4 class="pull-right">'.$value->getPrecio().'</h4>
                                        <h4><a href="infoArticulo.php?type=atraccion&id='.$i.'">'.wordwrap($value->getNombre(), 20, "<br />\n").'</a>
                                        </h4>
                                        <p>'.$value->getDescripcion().'</p>
                                    </div>
                                    <div class="ratings">
                                    <p class="pull-right">'.$value->sizeComentario().' reviews</p>
                                        <p>';
                                        for($j=0;$j< (int)$value->getEstrellas();$j++){
                                            echo '<span class="glyphicon glyphicon-star"></span> ';
                                        }
                                        if(strpos($value->getEstrellas(),'.')!=false){
                                            echo '<span class="glyphicon glyphicon-star half"></span> ';
                                        }
                            echo'
                                        </p>
                                    </div>
                                </div>
                            </div>
                            ';
                            $i++;
                            if($i%3==0){
                                echo '<div class="row"></div>';
                            }
                        }
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>

     <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>