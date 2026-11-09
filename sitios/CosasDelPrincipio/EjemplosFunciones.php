<?php
    /*function holaMundo(){
        $var="Hola Mundo";
        echo $var."<br>";
    }
    holaMundo();

    //tiene valoes por defecto
    function holaMundo2($var2=''){
        echo $var2."<br>";
        holaMundo();
    }
    holaMundo2("Juan");
    holaMundo2();

    //funcion que modifica el valor de la variable que le pasas EN EL PROGRAMA PRINCIPAL
    function sumar(&$x){
        $x++;
        echo $x."<br>";
    }

    $a=10;
    sumar($a);
    echo $a;*/
    $cadena="Hola Mundo";
    echo substr($cadena,1,8)."<br>";
    echo str_replace("o","p",$cadena);
    echo "<pre>";
    print_r(explode(" ",$cadena))."<br>";
    echo "</pre>";
    $arr=explode(" ",$cadena);
    echo "<pre>";
    print_r($arr)."<br>";
    echo "</pre>";
    echo $arr[0]."<br>";
    echo $arr[1]."<br>";

    $arr2=array("1 ","2 ","3 ");
    echo implode(",",$arr2);