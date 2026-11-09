<?php
    //variables
    $variable="hola";
    $numero=11;
    echo $variable."<br>";
    echo $numero."<br>";

    //constantes
    define("MI_CONSTANTE", "HOLA");
    define("MI_ARRAY", array("2", "3"));

    $miconstante=MI_CONSTANTE;
    echo MI_CONSTANTE."<br>";
    echo $miconstante."<br>";

    print_r (MI_ARRAY[0]);