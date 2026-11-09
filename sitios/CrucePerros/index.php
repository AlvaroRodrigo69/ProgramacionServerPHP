<?php
    require_once "Perro.php";
    $perro=new Perro($_GET["raza"],$_GET["color"],$_GET["peso"],$_GET["edad"],$_GET["sexo"]);
    $perro2=new Perro($_GET["raza2"],$_GET["color2"],$_GET["peso2"],$_GET["edad2"],$_GET["sexo2"]);
    $cachorro1=$perro->cruzar( $perro2);
    if($cachorro1==null){
        echo "no ha nacido ningun cachorro";
    }else{
        echo "los datos del cachorro son: <br>";
        print_r ($cachorro1);
    }
?>