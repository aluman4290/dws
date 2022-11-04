<?php
class Articulo
{
    protected $nombre = '';
    protected $precio = 0;

    function  __construct($pNombre, $pPrecio)
    {
        $this->nombre = $pNombre;
        $this->precio = $pPrecio;
    }

    public function __toString()
    {
        return 'Nombre: ' . $this->nombre . '<br />' . 'Precio: ' . $this->precio . ' &euro;<br />';
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($pPrecio)
    {
        is_int($pPrecio) === true ? $this->precio = $pPrecio :  $this->precio = 0;
    }
    
}
