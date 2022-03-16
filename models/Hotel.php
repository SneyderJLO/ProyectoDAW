<?php

require_once __DIR__ . '/./Database.php';

class Hotel extends Database{
    public static $tabla = 'hoteles';
    public static $columnasDb = ['Id','NombreHotel', 'Email', 'NumeroCuartos', 'TipoHotel', 'Estrellas'];
    function __construct($args = []){
        $this->id =$args['Id']??null;
        $this->nombreHotel = $args['Nombrehotel']??null;
        $this->ProvinciaCiudad = $args['ProvinciaCiudad']??null;
        $this->Email = $args['Email']??null;
        $this->NumeroCuartos = $args['NumeroCuartos']??null;
        $this->TipoHotel = $args['TipoHotel']??null;
        $this->Estrellas = $args['Estrellas']??null;
        
    }
    public static function getHoteles(){
        $query = "SELECT * FROM  hoteles";
        // $resultado = mysqli_query(self::$db, $query);

        $resultado = self::$db->prepare($query);
        $resultado->execute();
        $hoteles = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $hoteles;
    }

    // public function deletehotel() {
    //     $query = "DELETE FROM $this->tabla WHERE id = $this->id";
    //     // $resultado = mysqli_query($this->db, $query);
    //     $resultado = self::$db->prepare($query);
    //     $resultado->execute();
    //     return $resultado;
    // }
    public function insert() {
        $sql = "INSERT INTO " . static::$tabla . "(Nombrehotel, ProvinciaCiudad, Email, NumeroCuartos, TipoHotel, Estrellas) VALUES ('$this->nombreHotel ', '$this->ProvinciaCiudad ', '$this->Email ', '$this->NumeroCuartos ', '$this->TipoHotel ', '$this->Estrellas ')";
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;

    }
 
}