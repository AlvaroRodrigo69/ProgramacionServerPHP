<?php

// Importa el archivo que contiene la definición de la clase Persona
require_once('clases/Persona.php');

// Crea el primer objeto (instancia) de la clase Persona
$persona1 = new Persona('Víctor Hernán', 'Arana Flores', 29);

// Crea el segundo objeto de la clase Persona
$persona2 = new Persona('Iris Elizabeth', 'Godoy', 29);

// Muestra el nombre de la primera persona usando el método getNombre()
echo "El nombre de la persona 1 es: " . $persona1->getNombre();
echo "<br>";

// Muestra el nombre de la segunda persona
echo "El nombre de la persona 2 es: " . $persona2->getNombre();
echo "<br>";

// Ejemplo de cómo modificar la propiedad nombre después de la creación del objeto
$persona1->setNombre('Víctor');

// Muestra el nombre modificado
echo "El nombre de la persona 1 modificado es: " . $persona1->getNombre()."<br>";

//A los atributos en el main no se le spone el dollar!!!!
echo $persona2->nombre;
?>
