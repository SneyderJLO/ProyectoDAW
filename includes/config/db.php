<?php

//conectar a la bd
function conectarDB(){
    $db = new mysqli('<yourHost', 'yourUser', 'yourPass', 'yourDBName');

    if ($db->connect_errno) {
        return die('Error de conexión: ' . $db->connect_error);
    }

    return $db;
}

