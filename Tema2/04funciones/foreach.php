<?php
$color = array('blanco', 'verde', 'rojo');

echo ('<ul>');
foreach ($color as $key => $value) {
    echo ('<li>' . $value . '</li>');
}
echo ('</ul>');
