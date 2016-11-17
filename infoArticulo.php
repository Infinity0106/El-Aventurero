<?php
require_once('clases/Ciudad.php');
session_start();
switch ($_GET['type']) {
    case 'hotel':
        $objeto = $_SESSION['ciudad']->getHotelID($_GET['id']);
        break;
    case 'vuelo':
        $objeto = $_SESSION['ciudad']->getVueloID($_GET['id']);
        break;
    case 'restaurante':
        $objeto = $_SESSION['ciudad']->getRestauranteID($_GET['id']);
        break;
    case 'atraccion':
        $objeto = $_SESSION['ciudad']->getAtraccionID($_GET['id']);
        break;
}
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php echo '<title>'.$_SESSION['ciudad']->getNombre().'</title>'?>
    <link rel="icon" href="https://albertosolana.files.wordpress.com/2015/04/senderismo_408-63872.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
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

    footer {
        margin: 50px 0;
    }
    .thumbnail {
        padding:0px;
    }
    .panel {
        position:relative;
    }
    .panel>.panel-heading:after,.panel>.panel-heading:before{
        position:absolute;
        top:11px;left:-16px;
        right:100%;
        width:0;
        height:0;
        display:block;
        content:" ";
        border-color:transparent;
        border-style:solid solid outset;
        pointer-events:none;
    }
    .panel>.panel-heading:after{
        border-width:7px;
        border-right-color:#f7f7f7;
        margin-top:1px;
        margin-left:2px;
    }
    .panel>.panel-heading:before{
        border-right-color:#ddd;
        border-width:8px;
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
    #map-canvas{
        width: auto;
        border: 2px solid #95a5a6;
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
                        <a href="eraseAll.php"><span class="glyphicon glyphicon-search"></span> Nueva Buesqueda</a>
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
                <p class="lead"><?php echo $_SESSION['ciudad']->getNombre()?></p>
                <div class="list-group">
                    <a href="infoCiudad.php" class="list-group-item">
                        <span class="glyphicon glyphicon-chevron-left"></span> atras
                    </a>
                </div>
            </div>

            <div class="col-md-9">

                    <?php
                    if($_GET['type']!='vuelo'){
                        echo '<div class="thumbnail">
                        <div class="col-md-12" style="padding: 0">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">';
                                    
                                        $i=0;
                                        foreach($objeto->getFoto() as $value){
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
                                echo '</div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>';
                    }
                    else{
                        echo '<div class="thumbnail" style="position: absolute; width:100%">
                        <div class="col-md-12">
                            <div id="map-canvas" style="height:20%"></div>
                        </div> 
                        ';
                    }
                    ?>
                    <div class="caption-full">
                        <div class="col-md-12">
                            <h4 class="pull-right">
                                <?php 
                                if($_GET['type']!='restaurante'){
                                    echo $objeto->getPrecio();
                                }
                                ?>
                            </h4>
                            <h4 class="pull-left"><a href="#"><?php echo $objeto->getNombre();?></a></h4>
                        </div> 
                        <?php
                        if($_GET['type']!='vuelo'){
                            echo '
                            <div class="col-md-8">
                                <div id="map-canvas"></div>
                            </div>';
                        }
                        ?>
                        <?php
                        if($_GET['type']=='hotel'){
                            echo'<div id="info" class="col-md-4">
                                <p><span class="glyphicon glyphicon-map-marker"></span> '.$objeto->getDireccion().'</p>
                                <p><span class="glyphicon glyphicon-earphone"></span> '.$objeto->getTelefono().'</p>
                            </div>';
                        }
                        if($_GET['type']=='vuelo'){
                            echo'<div id="info" class="col-md-12">
                                <p><span class="glyphicon glyphicon-dashboard"></span> Núm. de vuelo '.$objeto->getNumVuelo().'</p>
                                <p><span class="glyphicon glyphicon-time"></span> Hora aprox. de salida '.$objeto->getHoraSalida().'</p>
                                <p><span class="glyphicon glyphicon-time"></span> Hora aprox. de llegada '.$objeto->getHoraLlegada().'</p>
                                <p><span class="glyphicon glyphicon-plane"></span> Saliendo de '.$objeto->getLugarSalida().'</p>
                                <p><span class="glyphicon glyphicon-road"></span> Llegando a '.$objeto->getLugarLlegada().'</p>
                            </div>';
                        }
                        if($_GET['type']=='restaurante'){
                            echo'<div id="info" class="col-md-4">
                                <p><span class="glyphicon glyphicon-tags"></span> '.$objeto->getDescripcion().'</p>
                                <p><span class="glyphicon glyphicon-map-marker"></span> '.$objeto->getLugar().'<br><br><br><br></p>
                            </div>';
                        }
                        if($_GET['type']=='atraccion'){
                            echo'<div id="info" class="col-md-4">
                                <p><span class="glyphicon glyphicon-bookmark"></span> '.$objeto->getDescripcion().'</p>
                                <p><span class="glyphicon glyphicon-map-marker"></span> '.$objeto->getLugar().'<br><br><br><br></p>
                            </div>';
                        }
                        ?>
                        
                    </div>
                    <?php
                    if($_GET['type']!='vuelo'){
                    echo '<div class="ratings">  
                        <p>';
                            
                            for($j=0;$j< (int)$objeto->getEstrellas();$j++){
                                echo '<span class="glyphicon glyphicon-star"></span> ';
                            }
                            if(strpos($objeto->getEstrellas(),'.')!=false){
                                echo '<span class="glyphicon glyphicon-star half"></span> ';
                            }
                            
                    echo'    </p>
                    </div>';
                    }
                    ?>
                </div>

                <?php
                if($_GET['type']!='vuelo'){
                echo'<div class="well">
                        <!-- Button to trigger modal --> 
    <a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal" style="margin-bottom: 15px">Deja tu comentario</a>
    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Deja tu comentario</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" name="commentform">
    <div class="form-group">
        <label class="control-label col-md-4" for="first_name">Nombre</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Autor"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="comment">Comentario o reseña</label>
        <div class="col-md-6">
            <textarea rows="6" class="form-control" id="comments" name="comments" placeholder="Cuentanos como fue tu visita?"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <a href="#myModal" role="button" class="btn btn-primary pull-right" data-toggle="modal">Enviar</a>
        </div>
    </div>
</form>
        </div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
        </div><!-- End of Modal dialog -->
    </div><!-- End of Modal -->
                    ';
                    $i=1;
                    foreach($objeto->getComentario() as $value){
                        echo '
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="col-sm-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>'.$value->getAutor().'</strong> <span class="text-muted">commented '.$i.' days ago</span>
                                    </div>
                                    <div class="panel-body">
                                        '.$value->getTexto().'
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div><!-- /row -->

                        <hr>
                        ';
                        $i++;
                    }
                echo '</div>';
                }
                ?>
            </div>

        </div>

    </div>
    <!-- /.container -->


    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBi1S4mrPa_omAkfUh0IhjeyE2Y496SGdg&sensor=false"></script>
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <?php
    if($_GET['type']!='vuelo'){
        $cords = "52.525595, 13.393085";
    }
    else{
        $cords = "25.7776659, -100.1094519";
    }
    echo '
        <script>
        if (document.getElementById("map-canvas")) {
            var myLatlng = new google.maps.LatLng('.$cords.');
            var mapOptions = {
                zoom: 14,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "'.trim(preg_replace('/\s\s+/', '', $objeto->getNombre())).'"
            });
        }
        //# sourceURL=pen.js
        </script>';
    ?>
    
    <script>
    $( document ).ready(function() {
        $("#map-canvas").css({"height": $("#info").height()+"px"});
    });
    </script>

</body>

</html>