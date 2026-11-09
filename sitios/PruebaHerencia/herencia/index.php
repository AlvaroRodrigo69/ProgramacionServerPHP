<?php

require_once 'Persona.php'; // Asegúrate de que el nombre del archivo coincida

// --- Creación y uso del objeto Peruano ---
$peruano = new Peruano();
$peruano->setNombre('Víctor Hernán');
$peruano->setApellidos('Arana', 'Flores'); // Esto imprimirá "Los apellidos se asignaron con éxito"

echo $peruano->getApellidos(); // Imprime: Arana Flores
echo "<br>";
var_dump($peruano);
echo "<hr>";


// --- Creación y uso del objeto Chileno ---
$chileno = new Chileno();
$chileno->setApellidos('Arana', 'Flores'); // Usa el método sobreescrito que invierte los apellidos

echo $chileno->getApellidos(); // Imprime: Flores Arana
echo "<br>";
var_dump($chileno);

?>
