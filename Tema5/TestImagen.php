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
    include('Imagen.php');

    $img = new Imagen('img1.jfif');
    $img2 = new Imagen("img2.jfif", 10);

    echo "<h1>Test 1</h1>";
    echo $img->__toString();
    echo $img2->__toString();
    echo "</br>";

    echo "<h1>Test 2</h1>";
    $img2->src = 'img1.jfif';
    echo $img2->__toString();
    echo "</br>";

    ?>
</body>

</html>