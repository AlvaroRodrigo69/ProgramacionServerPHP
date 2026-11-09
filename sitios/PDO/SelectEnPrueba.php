<?php
    $opciones=[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"];
    try {
        $db = new PDO('mysql:host=localhost;dbname=prueba', 'root', '', $opciones);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //hacer un select
        $resultado = $db->query('SELECT * FROM personas');
        while ($personas = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
            echo $personas->id." ".$personas->nombre." ".$personas->activo."<br>";
        }
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }
?>