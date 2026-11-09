<?php
    $lado=$_GET['lado'];
    if($lado<0){
        echo "Introduce un valor positivo, por favor";
    }else{
        $area=$lado**2;
        echo "el area es: ".$area;
    }
?>