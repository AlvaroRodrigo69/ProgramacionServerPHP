<?php
//Incluyo los archivos necesarios
require("./model/Coche.php");
require("./controller/CocheController.php");
//Instancio el controlador
$controller = new CocheController();
//$controller->index();
//Ruta de la home
$home="/www/PDOCoches/index.php/";
//Quito la home de la ruta de la barra de direcciones
$ruta=str_replace($home, "", $_SERVER["REQUEST_URI"]);
//Creo el array de ruta (filtrando los vacíos)
$array_ruta=array_filter(explode("/", $ruta));



//preguntamos por los verbos post, get , etc
// Verificar si la solicitud es un envío de formulario (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Leer el campo oculto 'action_method' para saber qué método llamar
  $method = $_POST['action_method'] ?? 'index'; 

  //Preparamos el objeto request que vamos a enviar a insertar o actualizar con los datos enviados por el formulario
  if ($method == "insertar") {
    $req = [
      'marca' => $_POST["marca"],
      'modelo' => $_POST["modelo"],
      'color' => $_POST["color"],
      'propietario' => $_POST["propietario"],
      'precio' => $_POST["precio"]
    ];
  }
  
  if ($method == "actualizar" && isset($array_ruta[0]) && $array_ruta[0] == "editar" && is_numeric($array_ruta[1])) {
    $req = [
      'id' => $array_ruta[1],
      'marca' => $_POST["marca"],
      'modelo' => $_POST["modelo"],
      'color' => $_POST["color"],
      'propietario' => $_POST["propietario"],
      'precio' => $_POST["precio"]
    ];
  }

  // Verificar si el método existe en el controlador antes de llamarlo
  if (method_exists($controller, $method)) {
    $controller->$method($req);
  } else {
    // Manejar el caso de un método no válido
    header("HTTP/1.0 404 Not Found");
    echo "Error: Método del controlador no encontrado.";
    exit();
  }
}




//Decido la ruta en función de los elementos del array
if (isset($array_ruta[0])) {
    //ESTO probablemente sea mejor con un switch, pruebalo luego
    if($array_ruta[0] == "ver" && is_numeric($array_ruta[1])){
        //Llamo al método ver pasándole la clave que me están pidiendo
        $controller->ver($array_ruta[1]);
    }
    elseif($array_ruta[0]=="color" && !is_numeric($array_ruta[1])){
        $controller->verColor($array_ruta[1]);
    }
    elseif($array_ruta[0] == "baja" && is_numeric($array_ruta[1])){
        $controller->baja($array_ruta[1]);
    }
    elseif($array_ruta[0]=="alta"){
        $controller->alta();
    }
} else {
    //Llamo al método por defecto del controlador
    echo "se ha producido un error, se mostraran todos los coches de la base de datos";
    $controller->index();
}