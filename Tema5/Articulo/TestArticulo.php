<?php
require('./ArticuloRebajado.php');
$nombre = 'Bicicleta';
$precio = 352.10;
$rebaja = 20;
$articuloRebajado = new ArticuloRebajado($nombre, $precio, $rebaja);

echo $articuloRebajado
    . '</br>'
    . "El precio del artículo rebajado es " . $articuloRebajado->precioRebajado()
    . ' &euro;</br>';
echo '<pre>';
echo var_dump($articuloRebajado);
echo '</pre>';
