<?php

//conectar a la bd
// function conectarDB(){
//     $db = new mysqli('localhost', '', '', '');

//     if ($db->connect_errno) {
//         return die('Error de conexión: ' . $db->connect_error);
//     }

//     return $db;
// }


function conectarDB(){
    $database_username = 'user';
    $database_password = 'pass';  
    $dbname="db-name";
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;
    $conexion = null; 
    try{
        $conexion = new PDO( $dsn, $database_username, $database_password ); 
    }catch(Exception $e){
            echo $e;
            die("error " . $e->getMessage());
    }
    return $conexion;
}