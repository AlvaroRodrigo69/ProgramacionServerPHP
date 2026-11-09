<?php
require_once ("src/interfaces/Enviable.php");
require_once ("src/interfaces/Descargable.php");
require_once ("src/traits/FormateaPrecio.php");
require_once ("src/traits/Descontable.php");
require_once ("src/modelo/Producto.php");
require_once ("src/modelo/Libro.php");
require_once ("src/modelo/Ebook.php");
require_once ("src/modelo/PackLibro.php");
require_once ("src/modelo/Camiseta.php");

$libro = new Libro(codigo:"LIB01",nombre:"Aprende PHP desde 0",precioBase:24,autor:"LauraGomez",pesoKg:0.8);//con named arguments
$ebook = new Ebook(codigo:"EBK01",nombre:"Git para principiantes",precioBase:9.99,formato:"EPUB",tamanoMb:3.2);
$camiseta = new Camiseta(codigo:"CAM01",nombre: "Hola, mundo",precioBase:15,talla:"M",pesoKg:0.20);
$pack = new PackLibro (codigo:"PCK01",nombre:"Base de datos con MySQL",precioBase:32,pesoKg:1.1,tamanoMb:8.4);
$libro -> aplicarDescuento(10);
$pack -> aplicarDescuento(10);
$ebook -> aplicarDescuento(10);
//$camiseta -> aplicarDescuento(10);
//Camiseta daría error porque no usa el trait de Descontable
$productos = array($libro,$ebook,$pack,$camiseta);
foreach ($productos as $producto) {
    echo ("<h3>".get_class($producto)."<br>".$producto -> getNombre().",<br> Precio base: ". 
    $producto -> getPrecioBase()."€<br> Descuento: ".$producto -> getDescuento()."% <br> Precios Final: ".
    $producto -> precioFinal()."<br> Precio Final(IVA) adaptado: ".$producto->precioFinalFormateado()."</h3>");
    if ($producto instanceof Descargable){
        echo("<br> <b> URL descarga: </b>".$producto->getURLDescarga());
        echo("<br> <b> Tamaño MB: </b>".$producto->getTamanoMB());
    }
    if( $producto instanceof Enviable){
        echo("<br> <b>Peso:</b>".$producto->getPesoKg());
        echo("<br> <b>Gastos de envío: </b>".$producto->calcularGastosEnvio());
        }
}

//Pregunta 1:
//$p = new Producto('X', 'Prueba', 10);
//Fatal error: Uncaught Error: Cannot instantiate abstract class Producto
//No se puede declarar un objeto de una clase abstracta
//Pregunta 2:
//Camiseta debería implementar descontable
//Pregunta 3:
//Porque Pack Libros puede ser tanto físico como digital
//Pack Libros ya hereda de Productos así que no podría heredar de mas clases
//Pregunta 4:
//El propio Main llama a descuento así que puede seguir sacando el valor
//que tendría el 0 como referencia