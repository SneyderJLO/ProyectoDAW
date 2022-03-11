<?php
require_once 'config/db.php';

class CategoriasvehiculosDAO {
     private $con;

    public function __construct() {
        $this->con = conectarDB();
    }
     public function listar() {
        $sql = "SELECT * FROM categoriavehiculo";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }   
}
