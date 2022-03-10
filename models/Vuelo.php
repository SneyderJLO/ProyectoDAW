<?php

require_once __DIR__ . '/./Database.php';

class Vuelo extends Database {
    public static $tabla = 'vuelos';
    public static $columnasDb = ['id', 'origen', 'destino', 'fecha_salida', 'fecha_regreso', 'precio'];

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
        // $resultado = mysqli_query(self::$db, $sql);
        // $resultado = self::$db->query($sql);

        // consulta con pdo
        $resultado = self::$db->prepare($sql);
        $resultado->execute();
        $vuelos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        // $vuelos = [];

        // var_dump($resultados);
        // exit;

        // while ($vuelo = $resultados) {
        //     $vuelos[] = $vuelo;
        // }

        return $vuelos;
    }
}
