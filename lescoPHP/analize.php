<?php
if($_POST){
  
   
   //recibo los datos y los decodifico con PHP
   $misDatosJSON = json_decode($_POST["datos"]);
   
   //con esto podría mostrar todos los datos del JSON recibido
   //print_r($misDatosJSON);
   
   //ahora muestro algún dato de este array bidimiesional
   $imagenBase64 = explode(',', $misDatosJSON[0]);
   //$image = base64_to_png($imagenBase64, 'imagen.png');
   $salida = "";
   $salida .= "<br>Imagen: " . $imagenBase64[1];
   echo $salida;
}else{
   echo "No recibí datos por POST";
}

function base64_to_png($base64_string, $output_file) {
    $ifp = fopen($output_file, "wb"); 

    fwrite($ifp, base64_decode($data[1])); 
    fclose($ifp); 

    return $output_file; 
}

?>
