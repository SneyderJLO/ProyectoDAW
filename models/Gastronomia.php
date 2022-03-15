<?php
require_once __DIR__ . '/./Database.php';

class Gastronomia extends Database{
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
    

    private function registrarPedido($data){
		try {
			$SQL = 'INSERT INTO gastronomia (opciones,cantidad,nombres, direccion, correo, telefono, detalles) VALUES (?,?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['opciones'],
									$data['cantidad'],
									$data['nombres'],
									$data['direccion'],
									$data['correo'],
									$data['telefono'],
									$data['detalles']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(registrarPedido) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}
    function set_RegistrarPedido($data){
		$this->registrarPedido($data);
	}

}


