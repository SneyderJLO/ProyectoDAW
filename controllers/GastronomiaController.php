<?php

class GastronomiaController {

    public static function index(Router $router) {
        $router->render('gastronomia/TenemeaNeysser', [
            'estilos' => '<link rel="stylesheet" href="styles/Tenemea-Css-Formulario.css" />',
        ]);
    }
}
