<?php
$color = array('blanco' => 'blanco.html', 'verde' => 'verde.html', 'rojo' => 'rojo.html');

echo ('<ul>');
foreach ($color as $key => $value) {
    echo ('<li><a href=' . $color[$key] . '>' . $key . '</a></li>');
}
echo ('</ul>');
