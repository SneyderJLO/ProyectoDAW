<?php

abstract class Database {

    protected static $db;
    protected static $tabla = '';
    protected static $columnasDb = [];
    // protected static $errores = [];

    // Conectar la base de datos
    public static function setDb( $database ){
        self::$db = $database;
    }

    // Obtener todos los registros de la tabla
    public static function getAll(){
        $sql = "SELECT * FROM " . static::$tabla;
        $resultado = self::$db->prepare($sql);
        $resultado->execute();
        $resultados = $resultado->fetchAll(PDO::FETCH_ASSOC);

        //retornamos el arreglo de objetos el cual esta instanciado
        return $resultados;
    }

    public static function delete($id) {
        $sql = "DELETE FROM " . static::$tabla . " WHERE id = " . $id;
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }
    
}
