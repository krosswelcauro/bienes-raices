<?php

namespace App;

class Propiedad {

    // BASE DE DATOS
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    // Errores
    protected static $errores = [];
    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    // Definiendo la conexion a la BD
    public static function setDB($database) {
        self::$db = $database;
    }

    public function guardar() {
        // Sanitizar los atributos
        $atributos = $this->sanitizarAtributos();

        $columnas = join(', ', array_keys($atributos));
        $filas = join("', '", array_values($atributos));

        $query = "INSERT INTO propiedades($columnas) VALUES ('$filas')";

        $resultado = self::$db->query($query);
        
        return $resultado;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    // Validacion
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if(!$this->precio) {
            self::$errores[] = "El precio es Obligatorio";
        }

        if(strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es Obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->habitaciones) {
            self::$errores[] = "El número de habitaciones es Obligatorio";
        }

        if(!$this->wc) {
            self::$errores[] = "El número de baños es Obligatorio";
        }

        if(!$this->estacionamiento) {
            self::$errores[] = "El número de estacionamiento es Obligatorio";
        }

        if(!$this->vendedores_id) {
            self::$errores[] = "Elige un vendedor";
        }

        if ( !$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }


        return self::$errores;
    }

    public function setImagen($imagen){
        if($imagen){
            $this->imagen = $imagen;
        }
    }

}