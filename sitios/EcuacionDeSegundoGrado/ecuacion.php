<?php
    $a=$_GET['valorA'];
    $b=$_GET['valorB'];
    $c=$_GET['valorC'];
    $parcial1=$b*(-1);
    $parcial2=$b**2-4*$a*$c;
    $parcial3=2*$a;
    if($parcial2>=0){
        $parcial4=sqrt($parcial2);
        $resultado1=($parcial1+$parcial4)/$parcial3;
        $resultado2=($parcial1-$parcial4)/$parcial3;
        if($resultado1==$resultado2){
            echo "Solo hay un resultado y es: ".$resultado1;
        }else{
            echo "El primer resultado es: ".$resultado1."<br>";
            echo "El segundo resultado es: ".$resultado2;
        }
    }else{
        echo "No existe solución";
    }
?>