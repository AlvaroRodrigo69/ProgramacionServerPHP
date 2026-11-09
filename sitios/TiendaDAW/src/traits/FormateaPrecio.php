<?php

    trait FormateaPrecio{
        public function formatearPrecio(float $importe): string{
            return number_format($importe, 2, ',','.').'€';
        }
    }

?>