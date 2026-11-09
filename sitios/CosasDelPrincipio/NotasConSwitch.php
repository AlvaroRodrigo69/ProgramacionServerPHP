<?php
    $nota=10;
    switch($nota){
        case($nota<5&&$nota>=0):
            echo "Insuficiente";
            break;
        case($nota>=5 && $nota<6):
            echo "Suficiente";
            break;
        case($nota>=6&&$nota<8):
            echo "Bien";
            break;
        case($nota>=8&&$nota<9):
            echo "notable";
            break;
        case($nota>=9&&$nota<=10):
            echo "sobresaliente";
            break;
        default:
            echo "introduzca un valor valido";
            break;
    }
?>