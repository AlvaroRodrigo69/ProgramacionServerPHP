<?php
/**
 * CLASE CONCRETA: EnvioEstandar
 * Hereda de MetodoEnvio y proporciona una implementación específica.
 */
class EnvioEstandar extends MetodoEnvio
{
    /**
     * Implementación obligatoria del método abstracto [7, 8].
     * Aquí definimos la lógica específica para el envío estándar.
     * La visibilidad ('protected') debe ser igual o menos restrictiva
     * que la definida en la clase abstracta.
     */
    protected function calcularCosto()
    {
        // Lógica simple de ejemplo: un costo fijo para el envío estándar.
        return 15.00;
    }
}