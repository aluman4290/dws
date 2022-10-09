<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h3>STRINGS</h3>
    <?php
    function f1($queryString = 'nombre=Jordi')
    {
        $filterQueryString = trim($queryString, "/");
        $name = sscanf($filterQueryString, "nombre=%s");
        echo ($name[0] . "\n");
        echo (strlen($name[0]) . "\n");
        echo (strtoupper($name[0]) . "\n");
        echo (strtolower($name[0]) . "\n");
    }
    $queryString1 = "/nombre=Federico/";
    $queryString2 = "nombre=Federico/";
    $queryString3 = "/nombre=Federico";
    $queryString4 = "nombre=Federico";
    echo f1($queryString1);
    echo ("</br>");
    echo f1($queryString2);
    echo ("</br>");
    echo f1($queryString3);
    echo ("</br>");
    echo f1($queryString4);
    echo ("</br>");
    echo f1();
    echo ("</br>");
    ?>

    <?php
    function f2($queryString = 'nombre=Jordi')
    {
        $filterQueryString = trim($queryString, "/");
        if (strpos($filterQueryString, "&")) {
            $params = explode("&", $filterQueryString);
            sscanf($params[0], "nombre=%s", $name);
            sscanf($params[1], "prefijo=%s", $prefix);
            $pos = strpos($name, $prefix, 0);
            $pos === 0 ? print("SI coinciden") : print("NO coinciden");
        } else {
            echo ("Falta el parametro prefijo");
        }
    }
    $queryString0 = "/nombre=Federico&prefijo=F/";
    $queryString1 = "nombre=Federico&prefijo=f/";
    $queryString2 = "/nombre=Federico&prefijo=J";
    $queryString3 = "nombre=Federico&prefijo=j";

    echo f2($queryString1);
    echo ("</br>");
    echo f2($queryString2);
    echo ("</br>");
    echo f2($queryString3);
    echo ("</br>");
    echo f2($queryString4);
    echo ("</br>");
    echo f2();
    echo ("</br>");
    ?>
</body>

</html>