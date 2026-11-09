<?php
    $equipoVisitiante=$_GET['equipoVisitante'];
    $equipoAnfitrion=$_GET['equipoAnfitrion'];
    $golesVisitante=$_GET['golesVisitante'];
    $golesAnfitrion=$_GET['golesAnfitrion'];
    if($golesAnfitrion>=0&&$golesVisitante>=0){
        if($golesVisitante>$golesAnfitrion){
            echo "Gana el ".$equipoVisitiante;
        }elseif($golesVisitante<$golesAnfitrion){
            echo "Gana el ".$equipoAnfitrion;
        }else{
            echo "Empate";
        }
    }else{
        echo "Introduzca valores positivos, por favor";
    }
?>