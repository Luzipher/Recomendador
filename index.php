<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$buscador = isset($_POST['buscador']) ? $_POST['buscador'] : '';



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendador</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .fondo{
           width: 960px;
           height: 540px;
           background-image: url('img/fondo1.jpg ');
           -webkit-background-size: cover;
           -moz-backgrund-size: cover;
           -o-background-size: cover;
           background-size: cover;
           margin: 150px auto; 
        }
        .cajaN{
            font-family: forte;
           position: absolute;
           margin-top: 5px;
           width: 265px;
           text-align: right;
           font-weight: bold;
           font-size: 1.8em;
           color:gold;
        }
        .cajaC{
            font-family: forte;
           position: absolute;
           margin-top: 53px;
           width: 330px;
           text-align: right;
           font-weight: bold;
           font-size: 1.8em;
           color:gold;
        }
        .cajaE{
            font-family: forte;
           position: absolute;
           margin-top: 6px;
           width: 860px;
           text-align: right;
           font-weight: bold;
           font-size: 1.8em;
           color:gold;
        }
        .cajaT{
            font-family: forte;
           position: absolute;
           margin-top: 45px;
           width: 765px;
           text-align: right;
           font-weight: bold;
           font-size: 1.8em;
           color:gold;
        }
        .cajaR{
            font-family: forte;
           position: absolute;
           margin-top: 80px;
           width: 820px;
           text-align: right;
           font-weight: bold;
           font-size: 1.8em;
           color:gold;
        }
        .cajaES{
            font-family: forte;
           position: absolute;
           margin-top: 494px;
           width: 935px;
           text-align: right;
           font-weight: bold;
           font-size: 1.8em;
           color:gold;
        }
        .cajaS{
            font-family: calibri;
           position: absolute;
           margin-top: 240px;
           width: 450px;
           text-align: left;
           font-weight: bold;
           font-size: 1.1em;
           color:white;
        }
        .cajaIm{
            position: absolute;
           margin-top: 180px;
           margin-left: 480px;
        }
    </style>
</head>

<body style="background-color: black;">
    <div>
        <?php
         $con = new SQLite3("animes.db") or die("problemas para conectar");
         $cs = $con -> query("SELECT * FROM vista1 WHERE comodin LIKE '%$buscador%'");
          while($res = $cs -> fetchArray()) {
            $numero= $res['numero'];
            $nombre = $res['nombre'];
            $categoria= $res['categoria'];
            $episodios= $res['numeroE'];
            $temporadas= $res['temporadas'];
            $recomendador= $res['recomendador'];
            $estrellas=$res['estrellas'];
            $sinposis=$res['sinopsis'];
             echo'  
             <div class="fondo">
             <div class="cajaN">
                 <p>'.$nombre.'</p>
             </div>
             <div class="cajaC">
                 <p>'.$categoria.'</p>
             </div>
             <div class="cajaE">
                 <p>'.$episodios.'</p>
             </div>
             <div class="cajaT">
                 <p>'.$temporadas.'</p>
             </div>
             <div class="cajaR">
                 <p>'.$recomendador.'</p>
             </div>
             <div class="cajaES">
                 <p>'.$estrellas.'</p>
             </div>
             <div class="cajaS">
                 <p>'.$sinposis.'</p>
             </div>
             <div class="cajaIm">
                 <video controls  width="450">
                    <source src="vid/'.$numero.'.mp4" type="video/mp4">
                </video>
             </div>
             </div>
             ';
                
            }
            $con -> close();
        ?>
    </div>
    
</body>
</html>