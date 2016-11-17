<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>El Aventurero</title>
    <link rel="icon" href="https://albertosolana.files.wordpress.com/2015/04/senderismo_408-63872.jpg">
    <!-- Bootstrap Core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- form validaiton css -->
    <link href="./css/formValidation.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html,
        body {
            height: 100%;
        }

        .carousel,
        .item,
        .active {
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }

        /* Background images are set within the HTML using inline CSS, not here */

        .fill {
            width: 100%;
            height: 100%;
            background-position: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        #searchForm{
            position: absolute;
            background-color: rgba(255,255,255,.7);
            border-radius: 25px;
            top: 50%;
            left: 50%;
        }

        .form-group{
            margin-bottom: 15px;
            margin-top: 15px;
        }
    </style>

    <style type="text/css">
        /* https://github.com/bassjobsen/typeahead.js-bootstrap-css */
        span.twitter-typeahead .tt-dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 14px;
            text-align: left;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-clip: padding-box;
        }
        span.twitter-typeahead .tt-suggestion > p {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333333;
            white-space: nowrap;
        }
        span.twitter-typeahead .tt-suggestion > p:hover,
        span.twitter-typeahead .tt-suggestion > p:focus {
            color: #ffffff;
            text-decoration: none;
            outline: 0;
            background-color: #428bca;
        }
        span.twitter-typeahead .tt-suggestion.tt-cursor {
            color: #ffffff;
            background-color: #428bca;
        }
        span.twitter-typeahead {
            width: 100%;
        }
        .input-group span.twitter-typeahead {
            display: block !important;
        }
        .input-group span.twitter-typeahead .tt-dropdown-menu {
            top: 32px !important;
        }
        .input-group.input-group-lg span.twitter-typeahead .tt-dropdown-menu {
            top: 44px !important;
        }
        .input-group.input-group-sm span.twitter-typeahead .tt-dropdown-menu {
            top: 28px !important;
        }
    </style>

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
                <a class="navbar-brand" href="#">El-Aventurero</a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for Slides -->
        <div class="carousel-inner" style="position: absolute">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('https://cdn.hotelplanner.com/Common/Images/_HotelPlanner/Home-Page/fade/sld5.jpg');"></div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('https://cdn.hotelplanner.com/Common/Images/_HotelPlanner/Home-Page/fade/sld6.jpg');"></div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.travelgdl-tours.com/wp-content/uploads/2016/02/546e158761756-1900x1080.jpg');"></div>
            </div>
        </div>
    </header>

    
    <div id="searchForm" class="pagination-centered" style="padding: 0 15px">
        <form id="formCiudad" class="form-horizontal" method="post" action="txtToClass.php">
            <div class="form-group">
            <label class="col-md-4 control-label" for="ciudad">Ciudad</label>
            <div class="col-md-4">
                <input id="ciudad" name="ciudad" type="search" placeholder="ex. Cancún, Quintana Roo" class="form-control input-md">
            </div>
            <div class="col-md-4" style="margin-top:5px;text-align:center">
                <input type="submit" class="btn btn-primary">
            </div>
            </div>
        </form>
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 4000 //changes the speed
    })
    </script>

    <!--resize form to center -->
    <script>
    $( document ).ready(function() {
        $("#searchForm").css({"width": 2*$(window).width()/5+"px"});
        $("#searchForm").css({"margin-left": -$("#searchForm").width()/2+"px"});
        $("#searchForm").css({"margin-top": -$("#searchForm").height()/2+"px"});
        
    });
    </script>

    <!--ciudades validas-->
    <script>
        $(document).ready(function() {
            var states = ['Cancún','Cd. de Mexico', 'Los cabos', 'Puerto Vallarta'];
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substrRegex;
                    /* an array that will be populated with substring matches */
                    matches = [];
                    /* regex used to determine if a string contains the substring `q` */
                    substrRegex = new RegExp(q, 'i');
                    /**
                    * iterate through the pool of strings and for any string that
                    * contains the substring `q`, add it to the `matches` array
                    */
                    $.each(strs, function(i, str) {
                        if (substrRegex.test(str)) {
                            /**
                            * the typeahead jQuery plugin expects suggestions to a
                            * JavaScript object, refer to typeahead docs for more info
                            */
                            matches.push({ value: str });
                        }
                    });
                    cb(matches);
                };
            };

            $('#formCiudad')
                .find('input[name="ciudad"]')
                    .typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    }, {
                        name: 'states',
                        displayKey: 'value',
                        source: substringMatcher(states)
                    })
                    .on('typeahead:selected', function(e, suggestion, dataSetName) {
                        /* Revalidate the state field */
                        if(dataSetName!='states'){
                            $('#typeheadForm').disableSubmitButtons(true);
                            
                        $('#typeheadForm').formValidation('revalidateField', 'state');
                        }
                    });

            $('#formCiudad')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        ciudad: {
                            validators: {
                                notEmpty: {
                                    message: 'La ciudad es requerida'
                                }
                            }
                        }
                    }
                }).on('success.field.fv', function(e, data) {
                    console.log(e);
                    console.log(data);
                });
        });
    </script>

    <!--typeahead-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.5/typeahead.jquery.js"></script>

    <!-- form validaiton js -->
    <script src="js/formValidation.js"></script>

</body>

</html>