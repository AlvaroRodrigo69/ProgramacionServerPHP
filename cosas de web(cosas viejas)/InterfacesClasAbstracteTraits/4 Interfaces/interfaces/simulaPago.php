<?php

// =================================================================
// PASO 1: DEFINICIÓN DE LA INTERFAZ Y LA CLASE
// Este código es el mismo que el del ejemplo anterior.
// Es necesario para que el script de abajo funcione.
// =================================================================

/**
 * Interfaz (Contrato) que define la estructura obligatoria para
 * cualquier método de pago.
 */
interface ProcesadorPago
{
    public function iniciarPago($monto);
    public function verificarPago();
    public function confirmarPago($transaccionId);
}

/**
 * Clase que implementa el contrato para pagos con Tarjeta de Crédito.
 * Al usar "implements ProcesadorPago", se compromete a tener los
 * tres métodos definidos en la interfaz.
 */
class PagoTarjetaCredito implements ProcesadorPago
{
    public function iniciarPago($monto)
    {
        echo "Iniciando pago de S/. {$monto} con Tarjeta de Crédito...<br>";
        // Aquí iría la lógica para conectarse a la pasarela de pago (ej. Stripe, Culqi).
        return true; // Simula que el inicio fue exitoso.
    }

    public function verificarPago()
    {
        echo "Verificando datos de la tarjeta y fondos disponibles...<br>";
        // Lógica para validar la tarjeta con el banco.
        return true; // Simula una verificación exitosa.
    }

    public function confirmarPago($transaccionId)
    {
        echo "<b>¡Pago confirmado!</b> ID de transacción: {$transaccionId}<br>";
        // Lógica para registrar el pago en la base de datos de la tienda.
    }
}


// =================================================================
// PASO 2: SCRIPT PARA PROCESAR UN PAGO
// Aquí es donde usamos la clase para realizar una transacción.
// =================================================================

// 1. Se crea un objeto (una instancia) de la clase PagoTarjetaCredito.
$pasarelaDePago = new PagoTarjetaCredito();

// 2. Se define el monto del carrito de compras.
$montoTotal = 150.50;

// 3. Se inicia el proceso de pago llamando al primer método de la interfaz.
if ($pasarelaDePago->iniciarPago($montoTotal)) {

    // 4. Si el inicio fue exitoso, se verifica el pago.
    if ($pasarelaDePago->verificarPago()) {

        // 5. Si la verificación es correcta, se genera un ID de transacción único.
        $idTransaccion = "TXN-" . rand(1000, 9999);

        // 6. Finalmente, se confirma el pago llamando al último método.
        $pasarelaDePago->confirmarPago($idTransaccion);

    } else {
        echo "Error: La verificación del pago falló. Fondos insuficientes o tarjeta inválida.<br>";
    }

} else {
    echo "Error: No se pudo iniciar el proceso de pago.<br>";
}

?>
