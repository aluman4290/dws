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

    $nombres = array('Vera', 'Esther', 'Marc', 'Jordi', 'Hugo', 'Alex');
    echo ("<p>Número de elementos que tiene el array = " . count($nombres) . "</p>");
    echo ("<p>Nombres del array = " . implode(' ', $nombres) . "</p>");
    asort($nombres);
    echo ("<p>Nombres ordenados alfabeticamente = " . implode(' ', $nombres) . "</p>");
    $reverse = array_reverse($nombres);
    echo ("<p>Nombres ordenados al reves = " . implode(' ', $reverse) . "</p>");
    echo ("<p>Posición de mi nombre en el array = " . array_search('Jordi', $nombres) . "</p>");



    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Edad</td>
        </tr>
        <?php
        $alumnos = [
            [
                "id" => "1",
                "nombre" => "Alex",
                "edad" => "18",
            ],
            [
                "id" => "2",
                "nombre" => "Vera",
                "edad" => "25",
            ],
            [
                "id" => "3",
                "nombre" => "Marc",
                "edad" => "16",
            ],
        ];
        foreach ($alumnos as $key => $value) {
            print("<tr>");
            print("<td>" . $alumnos[$key]['id'] . "</td>");
            print("<td>" . $alumnos[$key]['nombre'] . "</td>");
            print("<td>" . $alumnos[$key]['edad'] . "</td>");
            print("</tr>");
        }
        ?>
        </tr>
    </table>

    <?php
    $records = [
        [
            "id" => "1",
            "nombre" => "Alex",
            "edad" => "18",
        ],
        [
            "id" => "2",
            "nombre" => "Vera",
            "edad" => "25",
        ],
        [
            "id" => "3",
            "nombre" => "Marc",
            "edad" => "16",
        ],
    ];
    $first_names = array_column($records, 'nombre');
    echo ("<p>Nombres alumnos = " . implode(' ', $first_names) . "</p>");

    $numemros = array(1, 112, 4, 5, 1, 45, 7, 43, 2, 3);
    echo ("<p>Suma = " . array_sum($numemros) . "</p>");

    ?>
</body>

</html>