<?php

// require_once '../Router.php';
require __DIR__ . '/../models/Vuelo.php';

class VuelosController {

    public static function index(Router $router) {
        $vuelos = Vuelo::getVuelos();
        $router->render('admin/vuelos', [
            'vuelos' => $vuelos
        ]);
    }

    public static function verVuelos(Router $router) {

        $vuelos = Vuelo::getVuelos();

        $router->render('vuelos/RuizJonathan', [
            'vuelos' => $vuelos
        ]);
    }

}

