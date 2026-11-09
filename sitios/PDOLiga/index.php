<?php
    require_once("Modelo/Equipo.php");
    $ep=new Equipo(5,"real madrid", 20, 30, 40);
    $lista=Equipo::getEquipos();
    echo "<pre>";
    print_r($lista);
    $equipoNombre=Equipo::getEquipoPorNombre("barcelona");
    echo $equipoNombre->estado();
?>