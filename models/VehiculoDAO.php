<?php
require_once 'config/db.php';
//require_once 'modelo/dto/Producto.php';
class VehiculoDAO {
    // operaciones de acceso y manejo de datos
    private $con;
    
    public function __construct() {
        $this->con = conectarDB();
    }
    
    public function listar(){// listar todos los productos
        $sql = "select * from vehiculo, categoriavehiculo where id_categoria=id_categoria_vehiculo";
        $stmt =  $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar los resultados al controlador
        return $resultados; 
    }
    
    public function buscar($busq){
        $sql = "select * from vehiculo, categoriavehiculo where id_categoria=id_categoria_vehiculo and marca like :b1";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $busq . '%';
        $data = ['b1' => $conlike];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }
    
    
      public function insertar($placa, $color, $marca, $modelo, $precioDia, $aire_acondicionado, $id_categoria) {
        //sentencia sql        
         $sql = "insert into vehiculo(placa, color, marca, modelo, precioDia, aire_acondicionado, id_categoria)"
                 . " values(:placa, :color, :marca,:modelo,"
                    . ":precioDia, :aireacondicionado, :categoria)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
                'placa' => $placa,
                'color' => $color,
                'marca' => $marca,
                'modelo' => $modelo,
                'precioDia' => $precioDia,
                'aireacondicionado' => $aire_acondicionado,
                'categoria' => $id_categoria
            ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }

   public function actualizar($id, $placa, $color, $marca, $modelo, $precioDia, $aireacondicionado, $categoria) {
        //prepare
        $sql = "update vehiculo set placa=:placa, color=:color, marca=:marca, modelo=:modelo, precioDia=:precioDia, "
                . "aire_acondicionado=:aireacondicionado, id_categoria=:categoria where id_vehiculo=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);        
        $data = [

            'placa' => $placa,
            'color' => $color,
            'marca' => $marca,
            'modelo' => $modelo,
            'precioDia' => $precioDia,
            'aireacondicionado' => $aireacondicionado,
            'categoria' => $categoria,
            'id' => $id
            ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }

    public function eliminar($id) {
        //prepare
        $sql = "delete from vehiculo where id_vehiculo = :id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = ['id' => $id];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
        
        
        
        
    }
    
      public function buscarxId($id) { // buscar un producto por su id
        $sql = "select * from vehiculo where id_vehiculo=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $vehiculo = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $vehiculo;
    }
}
