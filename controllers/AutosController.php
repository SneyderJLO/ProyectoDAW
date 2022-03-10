<?php

class AutosController {
    public static function index(Router $router) {
        $router->render('autos/RonquilloVanessa', [
            'estilos' => '<link rel="stylesheet" href="styles/EstilosAutos.css" />',
        ]);
    }

    public static function adminAutos(Router $router) {

        // $resultados = $this->modelo->listar();

        $router->render('autos/adminForm', [
            'estilos' => '<link rel="stylesheet" href="/styles/EstilosAutos.css" />',
            'resultados' => [],
        ]);
    }
}
