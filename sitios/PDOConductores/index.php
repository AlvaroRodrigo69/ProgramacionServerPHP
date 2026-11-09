<?php
    require_once("./controller/ConductorController.php");
    require_once("./model/Conductor.php");
    $controller=new ConductorController();
    $home="/www/PDOConductores/index.php/";
    $ruta=str_replace($home, "",$_SERVER['REQUEST_URI']);
    $arrayRuta=explode("/",$ruta);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $method = $_POST['action_method'] ?? 'index'; 
        $req=[];
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

        if (method_exists($controller, $method)) {
            $controller->$method($req);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Error: Método del controlador no encontrado.";
            exit();
        }
    }


    //enrutamientos
    if(isset($arrayRuta[0])){
        if($arrayRuta[0]=='index'){
            $controller->index();
        }
        if($arrayRuta[0]=='eliminar' && is_numeric($arrayRuta[1])){
            $controller->eliminar($arrayRuta[1]);
        }
        if($arrayRuta[0]=='ver' && is_numeric($arrayRuta[1])){
            $controller->ver($arrayRuta[1]);
        }
        if($arrayRuta[0]=='mostrar' && !is_numeric($arrayRuta[1])){
            $controller->verPorCiudad($arrayRuta[1]);
        }
        //añadir puntos a los conductores, se pasan los puntos por la url, ejemplo de ruta home/addpuntos/3
        if($arrayRuta[0]=='addpuntos' && is_numeric($arrayRuta[1])){
            $controller->aniadirPuntos($arrayRuta[1]);
        }
        if($arrayRuta[0]=='modificar' && is_numeric($arrayRuta[1])){
            $controller->modificar($arrayRuta[1]);
        }
    }else{
        echo "Se a producido un error, por favor pruebe a introducir alguna de las rutas validas";
    }
?>