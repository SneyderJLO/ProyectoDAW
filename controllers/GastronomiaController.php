<?php
require __DIR__ . '/../models/Gastronomia.php';

class GastronomiaController extends Gastronomia{



    public static function index(Router $router) {

        $gastronomia = Gastronomia::getGastronomia();


        $router->render('gastronomia/TenemeaNeysser', [
            'estilos' => '<link rel="stylesheet" href="styles/Tenemea-Css-Formulario.css" />','gastronomia'=>$gastronomia
        ]);
    }
    public static function formAdmin(Router $router) {
        $gastronomia = Gastronomia::getGastronomia();
        $router->render('gastronomia/TenemeaNeysserformulario', [
            'estilos' => '<link rel="stylesheet" href="styles/Tenemea-Css-Formulario.css" />','gastronomia'=>$gastronomia


        ]);
    }

    
    public static function crearPedido(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ObjectPedido = new Gastronomia($_POST);

            
        
                $ObjectPedido->insert();
                header('Location: /TenemeaNeysserformulario');
            
        }

        $router->render('gastronomia/TenemeaNeysserformulario', [
        ]);
    }

    public static function eliminarPedido(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $pedido = new Gastronomia(['id' => $id]);
            $resultado = $pedido->delete($id);
            if($resultado) {
                header('Location: TenemeaNeysserformulario');
            }else{
                echo 'Error al Eliminar';
            }
        }
    }

    public static function actualizarPedido(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ObjectPedido = new Gastronomia($_POST);
                $ObjectPedido->update($_GET['id']);
                header('Location: TenemeaNeysserformulario');
            
        }
        $id = filter_var( $_GET['id'], FILTER_VALIDATE_INT );

        $ObjectPedido = new Gastronomia(['id' => $id]);
        $lista = $ObjectPedido->getOne();


        
        $router->render('gastronomia/actualizarPedido', [
            'lista' => $lista
        ]);
    }

   
}