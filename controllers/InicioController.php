<?php

class InicioController {
    public static function index(Router $router) {
        $router->render('inicio/Bayas', [
            'estilos' => '<link rel="stylesheet" href="styles/PrincipalEstilos.css" />',
        ]);
    }
}