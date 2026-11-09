<?php
    require_once("Producto.php");
    require_once("src/interfaces/Descargable.php");
    require_once("src/interfaces/Enviable.php");
    require_once("src/traits/Descontable.php");

    class PackLibro extends Producto implements Descargable, Enviable{

        private float $pesoKg;
        private float $tamanoMb;

        use Descontable;

        public function __construct($codigo, $nombre, $precioBase, $pesoKg, $tamanoMb) {
            $this->codigo=$codigo;
            $this->nombre=$nombre;
            $this->precioBase=$precioBase;
            $this->pesoKg=$pesoKg;
            $this->tamanoMb=$tamanoMb;
        }

        public function getPesoKg(): float{
            return $this->pesoKg;
        }

        public function setFormato($pesoKg){
            $this->pesoKg=$pesoKg;
            return $this;
        }

        public function getTamanoMb(): float{
            return $this->tamanoMb;
        }

        public function setTamanoMb($tamanoMb){
            $this->tamanoMb=$tamanoMb;
            return $this;
        }

        public function getTipo(): string{
            return "PackLibro";
        }

        protected function getIva(): float{
            return 4;
        }

        public function calcularGastosEnvio(): float{
            return 2.5+1+$this->pesoKg;
        }

        public function getUrlDescarga(): string{
            return "descargas/doscw.pdf";
        }
    }
?>