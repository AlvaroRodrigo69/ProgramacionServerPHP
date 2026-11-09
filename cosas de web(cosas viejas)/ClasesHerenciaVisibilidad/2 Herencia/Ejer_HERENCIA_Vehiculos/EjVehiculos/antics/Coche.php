<?php
//Requiero el archivo de clase para extenderlo en este script
require_once("Vehiculo.php");

class Coche extends Vehiculo
{
    function puedeAparcar($miPlanta){

        //True si está en el array y no es superficie
        return (array_search($miPlanta,$this->plantas) !== false && array_search($miPlanta,$this->plantas) > 0);

    }


}