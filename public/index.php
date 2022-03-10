<?php

require_once __DIR__ . '/../includes/app.php';
require '../Router.php';
require '../controllers/VuelosController.php';
require '../controllers/GastronomiaController.php';
require '../controllers/HotelController.php';
require '../controllers/AutosController.php';
require '../controllers/InicioController.php';


$router = new Router;

// Guardamos las rutas que se mostraran en el navegador
$router->get('/vuelos', [VuelosController::class, 'verVuelos']);
$router->get('/adminVuelos', [VuelosController::class, 'index']);
$router->get('/gastronomia', [GastronomiaController::class, 'index']);
$router->get('/hoteles', [HotelController::class, 'index']);
$router->get('/autos', [AutosController::class, 'index']);
$router->get('/', [InicioController::class, 'index']);

// Llamamos el metodo de comprobar rutas
$router->comprobarRutas();
