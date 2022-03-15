<?php
require __DIR__ . '/../models/Hotel.php';

class HotelController {
    public static function index(Router $router) {
        $hoteles = Hotel::getHoteles();
        $router->render('hoteles/DavilaJose', [
            'estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
            'hoteles' => $hoteles

        ]);
    }
    public static function verform(Router $router){
        $hoteles = Hotel::getHoteles();
        $router->render('hoteles/formularioDavila',['estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
        'hoteles' => $hoteles]);
    }
    public static function formadmin(Router $router){
        $hoteles = Hotel::getHoteles();
        // $delete = Hotel::deletehotel();
        $resultado = Hotel::insertarhoteles();
        $router->render('hoteles/formAdminhoteles',['estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
        'hoteles' => $hoteles,'resultado'=>$resultado]);
    }
}

