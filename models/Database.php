<?php

abstract class Database {

    protected static $db;
    protected static $tabla = '';
    protected static $columnasDb = [];
    protected static $errores = [];

    // Conectar la base de datos
    public static function setDb( $database ){
        self::$db = $database;
    }

    // Obtener todos los registros de la tabla
    public static function getAll(){
        $sql = "SELECT * FROM " . static::$tabla;
        $resultados = self::$db->query($sql);
        $consultas = [];

        // Si hay resultados los iteramos y creamos un array con los datos
        if($resultados){
            while($resultado = $resultados->fetch_object()){
                $consultas[] = new static( (array) $resultado);
            }
        }

        //retornamos el arreglo de objetos el cual esta instanciado
        return $consultas;
    }
}
