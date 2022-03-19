<?php
require __DIR__ . '/../models/ReservaViaje.php';

class InicioController extends ReservaViaje{
    public static function index(Router $router) {
        $reserva = ReservaViaje::getReservas();
        $router->render('inicio/Bayas', [
            'estilos' => '<link rel="stylesheet" href="styles/PrincipalEstilos.css" />',
            'inicio' => $reserva,
        ]);
    }
    public static function verReservas(Router $router) {
        $reserva = ReservaViaje::getReservas();  
        require __DIR__ . '/../views/inicio/presentarViaje.php';
    }

    public static function crearReserva(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ObjectPedido = new ReservaViaje($_POST);
                $ObjectPedido->insert();
                header('Location: presentarViaje');      
        }
        $router->render('inicio/AgregarViaje', [
        ]);
    }

    public static function eliminarReserva(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $reserva = new ReservaViaje(['id' => $id]);
            $resultado = $reserva->delete($id);
            if($resultado) {
                header('Location: presentarViaje');
            }else{
                echo 'Error al Eliminar';
            }
        }
    }

    public static function actualizarReserva(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ObjectReserva = new ReservaViaje($_POST);
                $ObjectReserva->update($_GET['id']);
                header('Location: presentarViaje');    
        }
        $id = filter_var( $_GET['id'], FILTER_VALIDATE_INT );
        $ObjectReserva = new ReservaViaje(['id' => $id]);
        $lista = $ObjectReserva->getOne();
        $router->render('inicio/editarViaje', [
            'lista' => $lista
        ]);
    }
}