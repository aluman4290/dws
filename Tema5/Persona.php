<?php

class Persona
{
    private $nombre;
    private $apellidos;
    private $edad;

    function __construct($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    function __get($propiedad)
    {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    function __set($propiedad, $valor)
    {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }

    public function mayorEdad()
    {
        return $this->edad >= 18;
    }

    public function nombreCompleto()
    {
        return $this->nombre . " " . $this->apellidos;
    }
}

$persona = new Persona("Fernando", "Ureña Gomez", 9);

if ($persona->mayorEdad()) {
    echo $persona->nombreCompleto() . "  es mayor de edad.";
} else {

    echo $persona->nombreCompleto() . "  no es mayor de edad.";
}
