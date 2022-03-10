<?php

class HotelController {
    public static function index(Router $router) {
        $router->render('hoteles/DavilaJose', [
            'estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
        ]);
    }
}
