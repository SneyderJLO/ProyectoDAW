<?php

require_once __DIR__ . '/./config/db.php';
require __DIR__ . '/../models/Database.php';


$db = conectarDB();

// Setear la conexion
Database::setDb($db);
