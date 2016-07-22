<?php

    $q = $_GET["q"];
    if($q !== ""){
        echo 'recibido';
    }
if($_POST){
  
   
   //recibo los datos y los decodifico con PHP
   $misDatosJSON = json_decode($_POST["q"]);
   echo $misDatosJSON;
   
   //con esto podría mostrar todos los datos del JSON recibido
   //print_r($misDatosJSON);
   
   //ahora muestro algún dato de este array bidimiesional
   //$imagenBase64 = explode(',', $misDatosJSON[0]);
   //$Base64Img = base64_decode($imagenBase64[1]);
//escribimos la información obtenida en un archivo llamado 
//unodepiera.png para que se cree la imagen correctamente
//file_put_contents('webcam.png', $Base64Img); 
//echo "<img src='webcam.png' alt='webcam' />";
//echo "alert($imagenBase64[1])";
   //$salida = "";
   //$salida .= "<br>Imagen: " . $imagenBase64[1];
   //echo $salida;
}else{
   echo "No recibí datos por POST";
}

?>
