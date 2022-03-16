<?php
require_once __DIR__ . '/./Database.php';

class Gastronomia extends Database{

    public function listar(){
        $sql = "select * from gastronomia";
        $stmt =  $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; 
    }
    public static $tabla = 'gastronomia';
    public static $columnasDb = ['id','opciones', 'cantidad', 'nombres', 'direccion', 'correo','telefono','detalles'];
    function __construct($args = []){
        $this->id =$args['id']??null;
        $this->opciones = $args['opciones']??null;
        $this->cantidad = $args['cantidad']??null;
        $this->nombres = $args['nombres']??null;
        $this->direccion = $args['direccion']??null;
        $this->correo = $args['correo']??null;
        $this->telefono = $args['telefono']??null;
        $this->detalles = $args['detalles']??null;
        
    }
    public static function getGastronomia(){
        $query = "SELECT * FROM  gastronomia";
        $resultado = self::$db->prepare($query);
        $resultado->execute();
        $gastronomia = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $gastronomia;
    }
    


    public function update($id) {
        $sql = "UPDATE " . static::$tabla . " SET opciones = '$this->opciones', cantidad = '$this->cantidad', nombres = '$this->nombres', direccion = '$this->direccion', correo = '$this->correo', telefono = '$this->telefono', detalles = '$this->detalles' WHERE id = $id";

        
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }

    public function getOne() {
        $sql = "SELECT * from gastronomia WHERE id = {$this->id};";
        $resultado = self::$db->prepare($sql);
        $resultado->execute();
        $lista = $resultado->fetch(PDO::FETCH_ASSOC);

        return $lista;
    }

    public function insert() {
        $sql = "INSERT INTO " . static::$tabla . " (opciones, cantidad, nombres, direccion, correo, telefono, detalles) VALUES ('$this->opciones', '$this->cantidad', '$this->nombres', '$this->direccion', '$this->correo', '$this->telefono', '$this->detalles')";
    
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }
}


