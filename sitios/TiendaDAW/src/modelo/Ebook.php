<?php
    require_once("Producto.php");
    require_once("src/interfaces/Descargable.php");
    require_once("src/traits/Descontable.php");
    
    class Ebook extends Producto implements Descargable{

        private string $formato;
        private float $tamanoMb;

        use Descontable;

        public function __construct($codigo, $nombre, $precioBase, $formato, $tamanoMb) {
            $this->codigo=$codigo;
            $this->nombre=$nombre;
            $this->precioBase=$precioBase;
            $this->formato=$formato;
            $this->tamanoMb=$tamanoMb;
        }

        public function getFormato(): string{
            return $this->formato;
        }

        public function setFormato($formato){
            $this->formato=$formato;
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
            return "Ebook";
        }

        protected function getIva(): float{
            return 4;
        }

        public function getUrlDescarga(): string{
            return "descargas/doscw";
        }
    }
?>