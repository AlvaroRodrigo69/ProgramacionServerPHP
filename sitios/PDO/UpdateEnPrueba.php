<?php
    $opciones=[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"];
    try {
        $db = new PDO('mysql:host=localhost;dbname=prueba', 'root', '', $opciones);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $registros = $db->exec('UPDATE personas SET activo=1 WHERE activo=0');
        if ($registros){
            echo "Se han activado $registros registros.";
        }
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }
?>