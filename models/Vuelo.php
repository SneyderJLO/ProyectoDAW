<?php

require_once __DIR__ . '/./Database.php';

class Vuelo extends Database {
    public static $tabla = 'vuelos';
    public static $columnasDb = ['id', 'origen', 'destino', 'fecha_salida', 'fecha_regreso', 'precio'];
    public $errores = [];

    function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->ciudad_origen_id = $args['ciudad_origen_id'] ?? null;
        $this->ciudad_destino_id = $args['ciudad_destino_id'] ?? null;
        $this->fecha_salida = $args['fecha_salida'] ?? null;
        $this->fecha_regreso = $args['fecha_regreso'] ?? null;
        $this->duracion = $args['duracion'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->tipoViaje = $args['tipoViaje'] ?? null;
    }

    public static function getVuelos(){
        $sql = "SELECT vuelos.id, fecha_salida, fecha_regreso, ciudades.ciudad as origen, c.ciudad as destino, precio, duracion FROM " . static::$tabla . " INNER JOIN ciudades ON ciudades.id = vuelos.ciudad_origen_id INNER JOIN ciudades as c ON c.id = vuelos.ciudad_destino_id;";

        // consulta con pdo
        $resultado = self::$db->prepare($sql);
        $resultado->execute();
        $vuelos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $vuelos;
    }

    public function insert() {
        $sql = '';
        if(empty($this->fecha_regreso)){
            $sql = "INSERT INTO " . static::$tabla . " (ciudad_origen_id, ciudad_destino_id, fecha_salida, duracion, precio) VALUES ('$this->ciudad_origen_id', '$this->ciudad_destino_id', '$this->fecha_salida', '$this->duracion', '$this->precio')";
        }else {
            $sql = "INSERT INTO $this->tabla (ciudad_origen_id, ciudad_destino_id, fecha_salida, fecha_regreso, duracion, precio) VALUES ('$this->ciudad_origen_id', '$this->ciudad_destino_id', '$this->fecha_salida', '$this->fecha_regreso', '$this->duracion', '$this->precio')";
        }

        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }

    public function getOne() {
        $sql = "SELECT vuelos.id, fecha_salida, fecha_regreso, ciudades.ciudad as origen, c.ciudad as destino, precio, duracion, ciudades.id as origen_id, c.id as destino_id FROM " . static::$tabla . " INNER JOIN ciudades ON ciudades.id = vuelos.ciudad_origen_id INNER JOIN ciudades as c ON c.id = vuelos.ciudad_destino_id WHERE vuelos.id = {$this->id};";
        // pdo
        $resultado = self::$db->prepare($sql);
        $resultado->execute();
        $vuelo = $resultado->fetch(PDO::FETCH_ASSOC);

        return $vuelo;
    }

    public function update($id) {
        $sql = '';
        if($this->tipoViaje == '2'){
            $this->fecha_regreso = 'null';
            $sql = "UPDATE " . static::$tabla . " SET ciudad_origen_id = '$this->ciudad_origen_id', ciudad_destino_id = '$this->ciudad_destino_id', fecha_salida = '$this->fecha_salida', fecha_regreso = $this->fecha_regreso, duracion = '$this->duracion', precio = '$this->precio' WHERE id = $id";
        }else {
            $sql = "UPDATE " . static::$tabla . " SET ciudad_origen_id = '$this->ciudad_origen_id', ciudad_destino_id = '$this->ciudad_destino_id', fecha_salida = '$this->fecha_salida', fecha_regreso = '$this->fecha_regreso', duracion = '$this->duracion', precio = '$this->precio' WHERE id = $id";
        }
        
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }

    public function getErrores() {

        if( empty($this->ciudad_origen_id) ) {
            $this->errores[] = "La ciudad de origen es obligatoria";
        }

        if( empty($this->tipoViaje) ) {
            $this->errores[] = "El tipo de viaje es obligatorio";
        }

        if( empty($this->ciudad_destino_id)) {
            $this->errores[] = "La ciudad de destino es obligatoria";
        }

        if( $this->ciudad_origen_id == $this->ciudad_destino_id ) {
            $this->errores[] = "La ciudad de origen no puede ser la misma que la ciudad de destino";
        }

        if( empty($this->fecha_salida) ) {
            $this->errores[] = "La fecha de salida es obligatoria";
        }

        if( empty($this->fecha_regreso) && $this->tipoViaje == '1' ) {
            $this->errores[] = "La fecha de regreso es obligatoria";
        }

        if( empty($this->duracion) ) {
            $this->errores[] = "La duración es obligatoria";
        }

        if( empty($this->precio) ) {
            $this->errores[] = "El precio es obligatorio";
        }

        if( !is_numeric($this->precio) ) {
            $this->errores[] = "El precio debe ser un número";
        }

        if( !is_numeric($this->duracion) ) {
            $this->errores[] = "La duración debe ser un número";
        }

        return $this->errores;
    }
}
