<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'comparer.php';

            $comparador = new comparadorImg(8);
            
            $f1 = './img/a.png';
            $f2 = './img/b.png';
            
            $im = imagecreatefrompng($f1);

            if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
            {
                echo 'Imagen convertida a escala de grises.';

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
            echo "<img width='400' height='300' src='".$f2."'><br><br>";	

            echo "<b>Diferencias</b> ".$dif."%<br>";
            echo "<b>Similitudes</b> ".(100-$dif)."%<br>";
        ?>
    </body>
</html>
