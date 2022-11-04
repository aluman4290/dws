<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('ImagenMejorada.php');

    $img = new Imagen('img1.jfif');
    $img2 = new Imagen("img2.jfif", 14);

    echo "<h1>Test 1</h1>";
    echo $img->__toString();
    echo $img2->__toString();
    echo "</br>";

    echo "<h1>Test 2</h1>";
    $img2->src = 'sdsrew';
    $img2->border = 'asdsa';
    echo $img2->__toString();
    echo "</br>";
    /**
     * Al pasar el valor a los atributos sin pasar por setSrc() y setBorder(), no se muestra ni la imagen ni el borde 
     * y no aparece el mensaje de error. 
     * 
     * Al declarar los atributos como protected, si intentamos modificar el valor sin pasar por los métodos setters, lanza el error
     * Fatal error: Uncaught Error: Cannot access protected property Imagen::$src in C:\Workspace Daw\dws\Tema5\Tema5.1\TestImagenMejorada.php:24 Stack trace: #0 {main} thrown in          :\Workspace Daw\dws\Tema5\Tema5.1\TestImagenMejorada.php on line 24
     * 
     */

    echo "<h1>Test 3</h1>";
    $img2->src = 'img3.jfif';
    echo $img2->__toString();
    var_dump($img2);

    ?>

</body>

</html>