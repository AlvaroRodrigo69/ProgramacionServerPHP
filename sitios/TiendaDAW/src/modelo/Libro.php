<?php
    require_once("Producto.php");
    require_once("src/interfaces/Enviable.php");
    require_once("src/traits/Descontable.php");

    class Libro extends Producto implements Enviable{

        private string $autor;
        private float $pesoKg;

        use Descontable;

        public function __construct($codigo, $nombre, $precioBase, $autor, $pesoKg) {
            $this->codigo=$codigo;
            $this->nombre=$nombre;
            $this->precioBase=$precioBase;
            $this->autor=$autor;
            $this->pesoKg=$pesoKg;
        }

        public function getAutor(): string{
            return $this->autor;
        }

        public function setAutor($autor){
            $this->autor=$autor;
            return $this;
        }

        public function getPesoKg(): float{
            return $this->pesoKg;
        }

        public function setPesoKg($pesoKg){
            $this->pesoKg=$pesoKg;
            return $this;
        }

        public function getTipo(): string{
            return "Libro";
        }

        protected function getIva(): float{
            return 4;
        }

        public function calcularGastosEnvio(): float{
            return 2.5+1+$this->pesoKg;
        }
    }
?>