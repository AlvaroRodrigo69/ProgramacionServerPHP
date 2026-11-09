<?php
// Incluir los archivos con las definiciones de las clases
require_once 'MetodoEnvio.php';
require_once 'EnvioEstandar.php';

// Dirección de destino del pedido
$direccionPedido = "Av. Siempre Viva 123, Springfield";

// 1. Creamos un objeto de la clase concreta, no de la abstracta [8].
$metodoEnvio = new EnvioEstandar($direccionPedido);

// 2. Llamamos al método concreto `generarEtiqueta`, que fue heredado de la clase abstracta [5].
// Este método, a su vez, llamará internamente a `calcularCosto` para obtener el precio.
$metodoEnvio->generarEtiqueta();