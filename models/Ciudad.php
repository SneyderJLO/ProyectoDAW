<?php
require_once __DIR__ . '/./Database.php';

class Ciudad extends Database {
    public static $tabla = 'ciudades';

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->ciudad = $args['ciudad'] ?? null;
    }

    // public function getAll() {
    //     $sql = "SELECT * FROM $this->tabla";
    //     // pdo
    //     $resultado = self::$db->prepare($sql);
    //     $resultado->execute();
    //     $ciudades = $resultado->fetchAll(PDO::FETCH_ASSOC);

    //     return $ciudades;
    // }
}
