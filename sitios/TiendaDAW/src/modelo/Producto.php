<?php
    require_once("src/traits/FormateaPrecio.php");

    abstract class Producto{
        protected string $codigo;
        protected string $nombre;
        protected float $precioBase;

        abstract public function getTipo():string;//lo implementa cada hijo y dice si es un ebook, camiseta ,etc
        abstract protected function getIva():float;//lo implementa cada hijo y dice el iva correspondiente del hijo

        public function getCodigo(): string{
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo=$codigo;
            return $this;
        }

        public function getNombre(): string{
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
            return $this;
        }

        public function getPrecioBase(): float{
            return $this->precioBase;
        }

        public function setPrecioBase($precioBase){
            $this->precioBase=$precioBase;
            return $this;
        }

        public function getDescuento():float{
            return 0;
        }

        public function precioFinal():float{
            $precioFinal=$this->precioBase*(1-$this->getDescuento()/100)*(1+$this->getIva()/100);
            return $precioFinal;
        }

        use FormateaPrecio;

        public function precioFinalFormateado():string{
            $precioFormateado=$this->formatearPrecio($this->precioFinal());
            return $precioFormateado;
        }
    }
?>