<?php

// require_once '../Router.php';
require __DIR__ . '/../models/Vuelo.php';
require __DIR__ . '/../models/Ciudad.php';

class VuelosController {

    public static function index(Router $router) {
        $vuelos = Vuelo::getVuelos();
        $router->render('vuelos/adminVuelos', [
            'vuelos' => $vuelos
        ]);
    }

    public static function verVuelos(Router $router) {

        $vuelos = Vuelo::getVuelos();

        $router->render('vuelos/RuizJonathan', [
            'vuelos' => $vuelos,

        ]);
    }

    public static function crearVuelo(Router $router) {

        $ciudades = new Ciudad;
        $ciudades = $ciudades->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $vueloObj = new Vuelo($_POST);

            // Validar los datos
            $errores = $vueloObj->getErrores();
            if (sizeof($errores) == 0) {
                $vueloObj->insert();
                header('Location: /admin/vuelos');
            }
        }

        $router->render('vuelos/crearVuelo', [
            'errores' => $errores ?? [],
            'ciudades' => $ciudades
        ]);
    }

    public static function eliminarVuelo(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $vuelo = new Vuelo(['id' => $id]);
            $resultado = $vuelo->delete($id);
            if($resultado) {
                header('Location: /admin/vuelos');
            }else{
                echo 'Error al Eliminar';
            }
        }
    }

    public static function actualizarVuelo(Router $router){
        $ciudades = new Ciudad;
        $ciudades = $ciudades->getAll();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $vueloObj = new Vuelo($_POST);
    
            // Validar los datos
            $errores = $vueloObj->getErrores();
            if(sizeof($errores) == 0) {
                $vueloObj->update($_GET['id']);
                header('Location: /admin/vuelos');
            }
        }

        if(isset($_GET['id'])){
            $id = filter_var( $_GET['id'], FILTER_VALIDATE_INT );
            if(!$id){
                header('Location: /admin/vuelos');
            }
    
            $vueloObj = new Vuelo(['id' => $id]);
            $vuelo = $vueloObj->getOne();
    
            if(!$vuelo){
                header('Location: /admin/vuelos');
            }
        }else{
            header('Location: /admin/vuelos');
        }

        $router->render('vuelos/actualizarVuelo', [
            'errores' => $errores ?? [],
            'ciudades' => $ciudades,
            'vuelo' => $vuelo
        ]);
    }
}


// require __DIR__ . '/Vuelo.php';
//     $errores = [];
//     $vuelo;

    

    