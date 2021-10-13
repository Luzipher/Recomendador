<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtCorreo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';
$txtPws = isset($_POST['txtPws']) ? $_POST['txtPws'] : '';



 if (isset($txtCorreo) && !empty($txtCorreo) && isset($txtPws) && !empty($txtPws)){
    $con = new SQLite3("animes.db") or die("problemas para conectar");
    $cs = $con -> query("SELECT * FROM usuarios WHERE correo='$txtCorreo'");

    $id = '';
    $nombre = '';
    $apellidoP = '';
    $apellidoM = '';
    $correo = '';
    $cont = '';
    $apodo='';

    while($resul = $cs -> fetchArray()){
        $id = $resul['id'];
        $nombre = $resul['nombre'];
        $apellidoP = $resul['apellidoP'];
        $apellidoM = $resul['apellidoM'];
        $apodo = $resul['apodo'];
        $correo = $resul['correo'];
        $cont = $resul['cont'];
    }

   if ($txtCorreo == $correo &&  $txtPws == $cont) {
       echo '
       <script>
        alert("bienvendio '.$apodo.'")
        window.location="buscador.html"
      </script>
      ';
   }else{
       echo '
       <script>
        alert("colocar bien los datos '.$apodo.'")
        window.location="login.html"
      </script>
       ';
   }
 }else{
     echo' 
      <script>
        window.location = "login.html"
      </script>
      ';
   }
?>