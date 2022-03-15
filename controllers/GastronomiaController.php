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

    function registrar(){
		$data = array(
					'opciones' 		=> $_REQUEST['opciones'],
					'cantidad' => $_REQUEST['cantidad'],
					'nombres'		=> $_REQUEST['nombres'],
					'direccion'		=> $_REQUEST['direccion'],
					'correo'		=> $_REQUEST['correo'],
					'telefono'		=> $_REQUEST['telefono'],
					'detalles'		=> $_REQUEST['detalles'],
					);		
					parent::set_RegistrarPedido($data);		
    }    
    
    
}