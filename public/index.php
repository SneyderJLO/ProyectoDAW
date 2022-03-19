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
$router->get('/TenemeaNeysserformulario', [GastronomiaController::class, 'formAdmin']);
$router->get('/hoteles', [HotelController::class, 'index']);
$router->get('/formularioDavila', [HotelController::class, 'verform']);
$router->get('/formAdminhoteles',[HotelController::class, 'formadmin']);

$router->get('/crearHotel', [HotelController::class, 'crearHotel']);
$router->post('/crearHotel', [HotelController::class, 'crearHotel']);
$router->post('/eliminarHotel', [HotelController::class, 'eliminarHotel']);
$router->get('/actualizarHotel', [HotelController::class, 'actualizarHotel']);
$router->post('/actualizarHotel', [HotelController::class, 'actualizarHotel']);

$router->get('/autos', [AutosController::class, 'index']);
$router->get('/inicio', [InicioController::class, 'index']);



// Administrador
$router->get('/admin/vuelos', [VuelosController::class, 'index']);
$router->get('/admin/crearVuelo', [VuelosController::class, 'crearVuelo']);
$router->post('/admin/crearVuelo', [VuelosController::class, 'crearVuelo']);
$router->post('/admin/eliminarVuelo', [VuelosController::class, 'eliminarVuelo']);
$router->get('/admin/actualizarVuelo', [VuelosController::class, 'actualizarVuelo']);
$router->post('/admin/actualizarVuelo', [VuelosController::class, 'actualizarVuelo']);
$router->get('/admin/autos', [AutosController::class, 'adminAutos']);



$router->get('/gastronomia', [GastronomiaController::class, 'index']);
$router->get('/crearPedido', [GastronomiaController::class, 'crearPedido']);
$router->post('/crearPedido', [GastronomiaController::class, 'crearPedido']);
$router->post('/eliminarPedido', [GastronomiaController::class, 'eliminarPedido']);
$router->get('/actualizarPedido', [GastronomiaController::class, 'actualizarPedido']);
$router->post('/actualizarPedido', [GastronomiaController::class, 'actualizarPedido']);

$router->get('/inicio', [InicioController::class, 'index']);
$router->get('/AgregarViaje', [InicioController::class, 'crearReserva']);
$router->post('/AgregarViaje', [InicioController::class, 'crearReserva']);
$router->get('/presentarViaje', [InicioController::class, 'verReservas']);
$router->get('/editarViaje', [InicioController::class, 'actualizarReserva']);
$router->post('/editarViaje', [InicioController::class, 'actualizarReserva']);
$router->post('/eliminarReserva', [InicioController::class, 'eliminarReserva']);


// Llamamos el metodo de comprobar rutas
$router->comprobarRutas();
