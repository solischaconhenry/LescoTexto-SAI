<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lesco-Text</title>
        
        <link rel="stylesheet" href="CSS/css.css" type="text/css">
        
        <!--Import for camera option-->
        <script src="JS/window.js"></script>
        <script src="JS/MooTools-Core-1.6.0.js" type="text/javascript"></script>
        <script src="JS/ReImg.js"></script>
        
         <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </head>
    <body class="body">
        <div class="navbar-wrapper">
            <div class="container-fluid">

                <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Lesco-Texto</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="diccionario.html">Diccionario</a></li>
                                <li class="active"><a href="#traduccion">Traducción</a></li>
                                <li><a href="#contactar">Sobre</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
        
        
        <div id="demo">
        <!-- FIN Navbar-->
        <?php
        include 'comparer.php';

        $comparador = new comparadorImg(8);
        $palabra = "";

        $imgArray = [
            //"h" =>  "Henry.png",
            //"e" =>  "Esteban.png",
            //"a" =>  "Carlos.png",
            "o" =>  "O-Carlos.png",
            "o1" =>  "O-Henry.png",
            "o2" =>  "O-Esteban.png",
            /*"o" =>  "a1.png",
            "o1" =>  "a1W.png",
            "o2" =>  "a1WEB.png",
            "a2" =>  "a2.png",
            "a3" =>  "a2WEB.png",
            "h" =>  "a3.png",
            "h1" =>  "a3WEB.png",
            "o3" =>  "a4.png",
            "h1" =>  "h.png",
            "o4" =>  "o.png"*/
        ];
        
       
        foreach ($imgArray as $i => $valor) {
            //echo $imgArray[$i] ." - ".$valor." - ".$i.'<br>';
            $f1 = "./img/O-Henry.png";
            //$f2 = "./img/a1w.png";
            $f2 = "./img/".$valor;
            
          
            $hash = $comparador->getHash_img($f1);
            //echo $hash;
            $dif = $comparador->comparar_imgs($f1, $f2);
            
            /*echo "<div class = 'row'>";
            echo "<img class = 'col-md-4' width='400' height='300' src='" . $f1 . "'>";
            echo "<img class = 'col-md-4' width='400' height='300' src='" . $f2 . "'><br><br>";
            echo "</div>";
            echo "<b>Diferencias</b> " . $dif . "%<br>";
            echo "<b>Similitudes</b> " . (100 - $dif) . "%<br>";*/
            if((100 - $dif) >= 50){
                  $palabra .= $i;

                
                 break;
            }
        }
            ?>
        <div class="row" style="margin-top: 20px;">
            <div class="container">
                <div class="row">
                    <h3 class="col-md-5">Captura</h3>
                    <div class="col-md-1"></div>
                    <h3 class="col-md-5">Traducción</h3>
                </div>
                
                <div class="col-md-5 translateboxes">
                    <div style="margin-left: 10%;"> 
                        <video class="center" id="video" width="300" height="300" autoplay></video>
                        <br>
                        <button  class="btn btn-info"id="btnCaptura">Capturar</button>
                        <br>
                        <br>
                        <canvas id="canvas" width="300" height="300"></canvas>
                        <br>
                        <div id="resultado"></div>
                        
                    </div>
                   
                </div>
                
                <div class="col-md-1"></div>
               
                <div class="col-md-5 translateboxes" style="height: auto">
                    <?php                                
                                echo '<p>'.$palabra.'</p>';
                    ?>
                </div>
            </div>
        </div>
        </div>
    </body>
<html>