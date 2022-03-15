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
$router->get('/gastronomia', [GastronomiaController::class, 'index']);
$router->get('/hoteles', [HotelController::class, 'index']);
$router->get('/formularioDavila', [HotelController::class, 'verform']);
$router->get('/formAdminhoteles',[HotelController::class, 'formadmin']);
$router->get('/autos', [AutosController::class, 'index']);
$router->get('/', [InicioController::class, 'index']);

// Administrador
$router->get('/admin/vuelos', [VuelosController::class, 'index']);
$router->get('/admin/crearVuelo', [VuelosController::class, 'crearVuelo']);
$router->post('/admin/crearVuelo', [VuelosController::class, 'crearVuelo']);
$router->post('/admin/eliminarVuelo', [VuelosController::class, 'eliminarVuelo']);
$router->get('/admin/actualizarVuelo', [VuelosController::class, 'actualizarVuelo']);
$router->post('/admin/actualizarVuelo', [VuelosController::class, 'actualizarVuelo']);
$router->get('/admin/autos', [AutosController::class, 'adminAutos']);

// Llamamos el metodo de comprobar rutas
$router->comprobarRutas();
