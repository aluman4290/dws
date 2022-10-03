<?php
//EJERCICIO 1
// insert into alumnos (nombre, apellidos) values (:nombre, :apellidos)
function insert($tabla, $campos)
{
    $keys = implode(", ", array_keys($campos));
    $values = [];
    foreach ($campos as $key => $campo) {
        array_push($values, ':' . $key);
    }
    $format = 'INSERT INTO %s (' . $keys . ') VALUES (%s)';

    return sprintf($format, $tabla, implode(", ", $values));
}

//EJERCICIO 2
// insert into alumnos (nombre, apellidos) values (:Juan, :Martínez)
function insertReferencia($tabla, $campos, &$cadena)
{
    $query = str_replace('tabla', $tabla, $cadena);
    $keys = implode(", ", array_keys($campos));
    $query = str_replace('campos', $keys, $query);
    $values = [];
    foreach ($campos as $key => $campo) {
        array_push($values, ':' . $campo);
    }
    return str_replace('valores', implode(", ", $values), $query);
}

//EJERCICIO 3
//UPDATE alumnos SET nombre=:nombre, apellidos=:apellidos WHERE id = :id 
function update($tabla, $campos)
{
    $fields = [];
    foreach ($campos as $ky => $cp) {
        array_push($fields, $ky . '=');
    }

    $values = [];
    foreach ($campos as $key => $campo) {
        array_push($values, ':' . $campo);
    }
    $set = $fields[1] . $values[1] . ", " . $fields[2] . $values[2];
    $id = $fields[0] . $values[0];
    $format = 'UPDATE %s SET %s  WHERE %s';

    return sprintf($format, $tabla, $set, $id);
}

//EJERCICIO 4
$func = function ($simb, $valor1, $valor2) {

    switch ($simb) {
        case '+':
            return $valor1 + $valor2;
            break;
        case '-':
            return $valor1 - $valor2;
            break;
        case '*':
            return $valor1 * $valor2;
            break;
        case '/':
            $valor2 == 0 ? 'No se puede dividir entre 0 ' : $valor1 / $valor2;
            break;
        default:
            break;
    }
};

function calcula($func, $simbolo, $operando1, $operando2)
{
    $format = '%d %s %d = %d';
    $resultado = $func($simbolo, $operando1, $operando2);
    printf($format, $operando1, $simbolo, $operando2, $resultado);
};


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
</head>

<body>
    <h1> EJERCICIO 1 </h1>

    <?php
    $tabla = "alumnos";
    $campos = array("nombre" => "Juan", "apellidos" => "Martínez");

    echo insert($tabla, $campos);
    ?>

    </br>
    <h1> EJERCICIO 2 </h1>
    <?php
    $tabla = "alumnos";
    $campos = array("nombre" => "Juan", "apellidos" => "Martínez");
    $cadena = "INSERT INTO tabla (campos) VALUES (valores)";

    echo insertReferencia($tabla, $campos, $cadena);
    ?>

    </br>
    <h1> EJERCICIO 3 </h1>
    <?php
    $tabla = "alumnos";
    $campos = array("id" => 1, "nombre" => "Juan", "apellidos" => "Martínez");

    echo update($tabla, $campos);

    ?>

    </br>
    <h1> EJERCICIO 4 </h1>
    <?php

    $simbolo = '+';
    $operando1 = 3;
    $operando2 = 5;

    calcula($func, $simbolo, $operando1, $operando2);
    ?>

</body>

</html>