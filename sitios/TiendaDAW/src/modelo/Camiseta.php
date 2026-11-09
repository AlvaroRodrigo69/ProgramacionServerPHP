<?php
    require_once("Producto.php");
    require_once("src/interfaces/Enviable.php");

    class Camiseta extends Producto implements Enviable{

        private string $talla;
        private float $pesoKg;

        public function __construct($codigo, $nombre, $precioBase, $talla, $pesoKg) {
            $this->codigo=$codigo;
            $this->nombre=$nombre;
            $this->precioBase=$precioBase;
            $this->talla=$talla;
            $this->pesoKg=$pesoKg;
        }

        public function getTalla(): string{
            return $this->talla;
        }

        public function setTalla($talla){
            $this->talla=$talla;
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
            return "Camiseta";
        }

        protected function getIva(): float{
            return 21;
        }

        public function calcularGastosEnvio(): float{
            return 1.95;
        }
    }
?>