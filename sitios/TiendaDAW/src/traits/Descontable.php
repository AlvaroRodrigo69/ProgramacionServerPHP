<?php
    trait Descontable{
        private float $descuento=0;

        public function aplicarDescuento(float $porcentaje): void{
            if($porcentaje>=0 && $porcentaje<=50){
                $this->descuento=$porcentaje;
            }else{
                throw new InvalidArgumentException("Porcentaje invalido",1);
            }
        }

        public function getDescuento(): float{
            return $this->descuento;
        }
    }
?>