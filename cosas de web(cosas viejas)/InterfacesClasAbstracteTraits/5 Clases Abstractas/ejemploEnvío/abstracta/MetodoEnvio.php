<?php

/**
 * CLASE ABSTRACTA: MetodoEnvio
 * Sirve como una plantilla para cualquier método de envío.
 * Define reglas y funcionalidades comunes.
 */
abstract class MetodoEnvio
{
    // Propiedad común que heredarán las clases hijas
    protected $direccionDestino;

    public function __construct($direccion)
    {
        $this->direccionDestino = $direccion;
    }

    /**
     * MÉTODO ABSTRACTO:
     * Obliga a las clases hijas a definir cómo calcularán el costo.
     * Es como una interfaz, pero puede ser 'protected' [1, 6].
     */
    abstract protected function calcularCosto();

    /**
     * MÉTODO CONCRETO:
     * Proporciona una funcionalidad ya desarrollada que las clases hijas heredan [5].
     * Puede usar los métodos abstractos, sabiendo que existirán en la clase hija.
     */
    public function generarEtiqueta()
    {
        $costo = $this->calcularCosto();
        
        echo "=============================<br>";
        echo "ETIQUETA DE ENVÍO<br>";
        echo "=============================<br>";
        echo "Dirección: {$this->direccionDestino}<br>";
        echo "Costo de envío: S/. " . number_format($costo, 2) . "<br>";
        echo "=============================<br>";
    }
}