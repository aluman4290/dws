<?php

class Imagen
{

    protected $src;
    protected $border;
    private $ruta_images = '\\Tema5\\images\\';

    function __construct($pSrc, $pBorder = 0)
    {
        $this->src;
        $this->border;
        $this->setSrc($pSrc);
        $this->setBorder($pBorder);
    }

    function setSrc($ruta)
    {
        $ruta_real = $_SERVER['DOCUMENT_ROOT'] . $this->ruta_images . $ruta;
        file_exists($ruta_real) === true ? $this->src = $ruta : print ' <p>No se ha encontrado el archivo ' . $ruta . '</p>';
    }

    function  setBorder($pBorder)
    {
        is_int($pBorder) && $pBorder >= 0 === true  ? $this->border =  $pBorder : print '<p>El tamaño del borde debe ser mayor o igual a 0 </p>';
    }

    public function __toString()
    {
        return "<img src=" . $this->ruta_images . $this->src . " border=" . $this->border . "/>";
    }
}
