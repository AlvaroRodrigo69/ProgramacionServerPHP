<?php

/**
 * Clase que contiene utilidades estáticas para el comercio electrónico.
 * No es necesario instanciar esta clase para usar sus funciones.
 */
class CalculadoraImpuestos
{
    // PROPIEDAD ESTÁTICA: La tasa de impuesto.
    // Pertenece a la clase, no a un producto específico.
    public static $TASA_IGV = 0.18;

    /**
     * MÉTODO ESTÁTICO: Calcula el precio total de un producto con impuestos.
     * Es una función de utilidad que no depende de propiedades de un objeto.
     */
    public static function calcularPrecioFinal($precioBase)
    {
        // Para acceder a la propiedad estática desde dentro de la clase, usamos 'self::'.
        $impuesto = $precioBase * self::$TASA_IGV;
        $precioFinal = $precioBase + $impuesto;

        return $precioFinal;
    }

    /**
     * MÉTODO ESTÁTICO: Una función de validación simple.
     * Los métodos estáticos pueden usarse para comprobar que un valor está bien definido.
     */
    public static function esPrecioValido($precio)
    {
        return is_numeric($precio) && $precio > 0;
    }
}


// --- Uso de las propiedades y métodos estáticos ---

// 1. Uso directo de la propiedad estática (sin instanciar).
echo "Tasa de Impuesto (IGV) actual: " . (CalculadoraImpuestos::$TASA_IGV * 100) . "%<br>";

$precioProducto = 250.00;

// 2. Uso directo del método estático para validación (sin instanciar).
if (CalculadoraImpuestos::esPrecioValido($precioProducto)) {

    // 3. Uso directo del método estático para cálculo (sin instanciar).
    $precioFinal = CalculadoraImpuestos::calcularPrecioFinal($precioProducto);

    echo "Precio base del producto: S/. {$precioProducto}<br>";
    echo "Precio final del producto (con impuesto): S/. " . number_format($precioFinal, 2) . "<br>";
}

// 4. Intento de acceder a la propiedad estática con una instancia (no recomendado, pero funciona)
$calculadora = new CalculadoraImpuestos();
echo "Precio final para 500.00: S/. " . $calculadora::calcularPrecioFinal(500.00) . "<br>";
// NOTA: Se sigue usando la notación :: incluso si la variable está instanciada, pues la funcionalidad es de la CLASE.
