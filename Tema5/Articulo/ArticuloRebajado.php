<?php
require("./Articulo.php");
final class  ArticuloRebajado extends Articulo
{
    private $rebaja  = 0;
    private $articulo;

    function __construct($pNombre, $pPrecio, $pRebaja)
    {
        $this->articulo  = new Articulo($pNombre, $pPrecio);
        $this->rebaja = $pRebaja;
    }

    private function calculaDescuento()
    {
        return $this->articulo->precio * $this->rebaja / 100;
    }

    public function precioRebajado()
    {
        return $this->articulo->precio - $this->calculaDescuento();
    }

    public function __toString()
    {
        return $this->articulo->__toString()
            . 'La rebaja es: ' . $this->rebaja . ' %' . '</br>'
            . 'El descuento es ' . self::calculaDescuento() . '€';
    }
}
