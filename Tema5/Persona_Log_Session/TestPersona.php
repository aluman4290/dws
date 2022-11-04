<?php
include('Persona.php');

$persona = new Persona("Fernando", "Ureña Gomez", 18);

if ($persona->mayorEdad()) {
    echo $persona->nombreCompleto() . " es mayor de edad.";
} else {

    echo $persona->nombreCompleto() . " no es mayor de edad.";
}
