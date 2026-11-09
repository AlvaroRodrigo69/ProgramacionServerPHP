<?php

class Persona
{
    // Propiedades del objeto
    public $nombre;
    public $apellido;
    public $edad;

    // Método constructor: se ejecuta al crear una instancia de la clase
    public function __construct($nombre, $apellido, $edad)
    {
        // Asigna los valores pasados como parámetros a las propiedades del objeto
        $this->nombre = strtolower($nombre); // Almacena el nombre en minúsculas
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    // Setter para el nombre: controla cómo se asigna un nuevo valor
    public function setNombre($nombre)
    {
        $this->nombre = strtolower($nombre);
    }

    // Getter para el nombre: controla cómo se devuelve el valor
    public function getNombre()
    {
        // Devuelve el nombre con la primera letra de cada palabra en mayúscula
        return ucwords($this->nombre);
    }
}
