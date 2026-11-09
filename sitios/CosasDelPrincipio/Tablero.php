<?php
    $filas=array(0,0,0,0,0,0,0,0,0,0);
    $mar=array();
    for($i=0;$i<10;$i++){
        $mar[$i]=$filas;
    }
    $mar[6][6]=1;
    visualizarTablero($mar);
    
    function visualizarFila($filaActual,$tablero){
        for($i=0;$i<10;$i++){
            echo $tablero[$filaActual][$i]." ";
        }
    }

    function visualizarTablero($arr){
        for($i=0;$i<10;$i++){
            visualizarFila($i,$arr);
            echo "<br>";
        }
    }
?>