<?php
require_once __DIR__ . '/./Database.php';

class ReservaViaje extends Database{
    public function listar(){
        $sql = "select * from reserva";
        $stmt =  $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; 
    }
    public static $tabla = 'reserva';
    public static $columnasDb = ['id','usuario', 'contraseña','nombre', 'destino', 'fecha_viaje','email','telefono'];
    function __construct($args = []){
        $this->id =$args['id']??null;
        $this->usuario = $args['usuario']??null;
        $this->nombre = $args['nombre']??null;
        $this->contraseña = $args['contraseña']??null;
        $this->destino = $args['destino']??null;
        $this->fecha_viaje = $args['fecha_viaje']??null;
        $this->email = $args['email']??null;
        $this->telefono = $args['telefono']??null;   
    }
    public static function getReservas(){
        $query = "select * from  reserva";
        $resultado = self::$db->prepare($query);
        $resultado->execute();
        $reserva = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $reserva;
    }
    public function update($id) {
        $idp = htmlentities($_POST['id2']);
            $usuario = htmlentities($_POST['usuario']);
            $nombre = htmlentities($_POST['nombre']);
            $contraseña = htmlentities($_POST['contraseña']);
            $destino = htmlentities($_POST['destino']);
            $fecha = htmlentities($_POST['fecha']);
            $email = htmlentities($_POST['email']);
            $telefono = htmlentities($_POST['telefono']);
        

            $sql = "update reserva set id =$idp, usuario ='$usuario', nombre = '$nombre', contraseña = '$contraseña',"
                    . " destino = '$destino', fecha_viaje = '$fecha', email = '$email', telefono=  '$telefono'  where id=$idp";
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }

    public function getOne() {
        $sql = "SELECT * from reserva WHERE id = {$this->id};";
        $resultado = self::$db->prepare($sql);
        $resultado->execute();
        $lista = $resultado->fetch(PDO::FETCH_ASSOC);

        return $lista;
    }

    public function insert() {
		$usuario = htmlentities($_POST['usuario']);
		$nombre = htmlentities($_POST['nombre']);
		$contraseña = htmlentities($_POST['contraseña']);
        $destino = htmlentities($_POST['destino']);
        $fecha = htmlentities($_POST['fecha']);
		$email = isset($_POST['email']) ? htmlentities($_POST['email']) : '';
		$telefono = htmlentities($_POST['telefono']);

		$sql = "insert into reserva(usuario, nombre, contraseña, destino, fecha_viaje, email, telefono) "
				. "values('$usuario','$nombre','$contraseña','$destino','$fecha','$email','$telefono')";
        $resultado = self::$db->prepare($sql);
        $resultado->execute();

        return $resultado;
    }
}
