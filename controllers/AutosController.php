<?php

class AutosController {
    public static function index(Router $router) {
        $router->render('autos/RonquilloVanessa', [
            'estilos' => '<link rel="stylesheet" href="styles/EstilosAutos.css" />',
        ]);
    }
}
