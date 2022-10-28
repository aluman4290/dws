<?php

class Imagen
{

    protected $src;
    protected $border;
    private $ruta_images = 'images/';

    function __construct($src, $border = 0)
    {
        $this->src = $src;
        $this->border = $border;
    }

    public function __toString()
    {
        return "<img src=" . $this->ruta_images . $this->src . " border=" . $this->border . "/>";
    }
}
