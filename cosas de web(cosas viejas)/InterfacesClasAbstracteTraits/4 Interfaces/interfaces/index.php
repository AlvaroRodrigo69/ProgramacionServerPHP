<?php

// --- Definición de interfaces base ---
interface InterfazA
{
    public function pruebaUno();
}

interface InterfazB
{
    public function pruebaDos();
}

interface InterfazC
{
    public function pruebaTres();
}


// --- Herencia Múltiple entre Interfaces ---
// La InterfazD hereda los métodos de InterfazA e InterfazB.
// Esto se logra con la palabra "extends" y separando las interfaces con comas.
interface InterfazD extends InterfazA, InterfazB
{
    // InterfazD ahora "contiene" pruebaUno(), pruebaDos()
}


// --- Implementación de una interfaz que hereda de otras ---
// La clase MiClase implementa InterfazD
class MiClase implements InterfazD
{
    // Al implementar InterfazD, está obligada a definir los métodos
    // de InterfazD y también los de las interfaces que esta extiende (A y B).
    public function pruebaUno()
    {
        echo "Método de la Interfaz A implementado.<br>";
    }

    public function pruebaDos()
    {
        echo "Método de la Interfaz B implementado.<br>";
    }
}

// Uso del código
$objeto = new MiClase();
$objeto->pruebaUno();
$objeto->pruebaDos();
