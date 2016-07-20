<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lesco-Text</title>
    </head>
    <body>
        <h3>Lesco a Texto</h3>
        <form enctype="multipart/form-data" action="index.php" method="POST">
            <label for="imagen">Imagen: </label>
            <input type="file" name="imagen" id="imagen" accept="image/png">
            <input type="submit" name="subir" value="Traducir" />
        </form>
        <?php
            include 'comparer.php';

             echo ('Hola Esteban esto es una prueba para probar lo que estamos probando.');
            $comparador = new comparadorImg(8);
            
            $imgArray = [
                "a" =>  "a.png",
                "b" =>  "b.png",
                "c" =>  "mina.jpg"
            ];
            
            
            //comprobamos si ha ocurrido un error.
            if ($_FILES["imagen"]["error"] > 0) {
                echo "ha ocurrido un error";
            } else {
                //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
                //y que el tamano del archivo no exceda los 100kb
                $permitidos = "image/png";
                $limite_kb = 10000;

                if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
                    //esta es la ruta donde copiaremos la imagen
                    //recuerden que deben crear un directorio con este mismo nombre
                    //en el mismo lugar donde se encuentra el archivo subir.php
                    $ruta = "img/" . $_FILES['imagen']['name'];
                    //comprobamos si este archivo existe para no volverlo a copiar.
                    //pero si quieren pueden obviar esto si no es necesario.
                    //o pueden darle otro nombre para que no sobreescriba el actual.
                    if (!file_exists($ruta)) {
                        //aqui movemos el archivo desde la ruta temporal a nuestra ruta
                        //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
                        //almacenara true o false
                        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                        if ($resultado) {
                            $comparador = new comparadorImg(8);
                            
                            foreach($imgArray as &$valor){
                                $f1 = $_FILES['imagen'];
                                $f2 = './img/'.$valor;

                                $im = imagecreatefrompng($f1);

                                if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
                                {
                                    echo 'Imagen convertida a escala de grises.'."<br><br>";

                                    imagepng($im, $f1); //convierte la imagen y la asigna a la imagen enviada
                                }
                                else
                                {
                                    echo 'La conversión a escala de grises falló.';
                                }

                                imagedestroy($im);

                                $hash       = $comparador->getHash_img('./img/mina.jpg');
                                //echo $hash;
                                $dif        = $comparador->comparar_imgs($f1,$f2);


                                echo "<img width='400' height='300' src='".$f1."'><br><br>";	

                                echo "<b>Diferencias</b> ".$dif."%<br>";
                                echo "<b>Similitudes</b> ".(100-$dif)."%<br>";
                            }
                        } else {
                            echo "ocurrio un error al mover el archivo.";
                        }
                    } else {
                        echo $_FILES['imagen']['name'] . ", este archivo existe";
                    }
                } else {
                    echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                }
            }
        ?>
    </body>
</html>
