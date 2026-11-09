<?php
require 'app/Core/DB.php';
require 'app/Controllers/PostsController.php';
require 'app/Controllers/UsersController.php';
session_start();
define('VIEWS_PATH', __DIR__ . '/app/Views');
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$home = "/www/PDOPosts";
$uri=str_replace($home, "",$uri_path);
switch ($uri) {
    case '/':
        $controller=new UsersController();
        $estadoFormulario=$_SERVER['REQUEST_METHOD'];
        if($estadoFormulario=='POST'){
            $nombre=$_POST["nombre"];
            $clave=$_POST["clave"];
            $controller->loggear($nombre, $clave);
        }else{
            $controller->flogin();
        }
        break;
    case '/index.php/registrar':
        $controller=new UsersController();//controlador de la tabla usuarios
        $estadoFormulario=$_SERVER['REQUEST_METHOD'];
        if($estadoFormulario=='POST'){
            $nombre=$_POST["usuario"];
            $clave=$_POST["pass"];
            $controller->realizarRegistro($nombre, $clave);
        }else{
            $controller->registrar();
        }
        break;
    case '/index.php/home':
        $controller = new PostsController();
        $controller->index();
        break;
    case '/index.php/show':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller = new PostsController();
        $controller->show($id);
        break;
    case '/index.php/insertar':
        if(isset($_SESSION['id'])){
            $controller=new PostsController();
            //si no mostramos el formulario lo muestra, y el formulario nos devuelve a este mismo if al enviar , provocando que se vaya al else y se inserte 
            $estadoFormulario=$_SERVER['REQUEST_METHOD'];
            if($estadoFormulario=='POST'){
                $titulo=$_POST["titulo"];
                $cuerpo=$_POST["cuerpo"];
                $controller->realizarInsercion($titulo, $cuerpo);
            }else{
                $controller->ins();
            }
        }else{
            echo"inicie sesion para insertar un post<br>";
            echo '<a href="/www/PDOPosts/">Haga click para iniciar sesion</a>';
        }
        break;
    case '/index.php/editar':
        if(isset($_SESSION['id'])){
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            $controller = new PostsController();
            $estadoFormulario=$_SERVER['REQUEST_METHOD'];
            if($estadoFormulario=='POST'){
                $idform=$_POST['id'];
                $titulo=$_POST["titulo"];
                $cuerpo=$_POST["cuerpo"];
                $controller->realizarActualizacion($idform, $titulo, $cuerpo);
            }else{
                $controller->edit($id);
            }
        }else{
            echo'inicie sesion para editar un post<br>';
            echo '<a href="/www/PDOPosts/">Haga click para iniciar sesion</a>';
        }
        break;
    case '/index.php/cerrar':
        require VIEWS_PATH. "/CerrarSession.php";
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada";
        break;
}