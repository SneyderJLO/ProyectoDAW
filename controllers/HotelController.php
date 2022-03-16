<?php
require __DIR__ . '/../models/Hotel.php';

class HotelController {
    public static function index(Router $router) {
        $hoteles = Hotel::getHoteles();
        $router->render('hoteles/DavilaJose', [
            'estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
            'hoteles' => $hoteles

        ]);
    }
    public static function verform(Router $router){
        $hoteles = Hotel::getHoteles();
        $router->render('hoteles/formularioDavila',['estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
        'hoteles' => $hoteles]);
    }
    public static function formadmin(Router $router){
        $hoteles = Hotel::getHoteles();


        $router->render('hoteles/formAdminhoteles',['estilos' => '<link rel="stylesheet" href="styles/estilos.css" />',
        'hoteles' => $hoteles]);
    }

    public static function eliminarHotel(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $hotel = new Hotel(['id' => $id]);
            $resultado = $hotel->delete($id);
            if($resultado) {
                header('Location: formAdminhoteles');
            }else{
                echo 'Error al Eliminar';
            }
        }
    }

    public static function crearHotel(Router $router) {

        // $ciudades = new Ciudad;
        // $ciudades = $ciudades->getAll();
        $hoteles = new Hotel;
        $hoteles = $hoteles->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hotelobj = new Hotel($_POST);

            // Validar los datos
         
        
            $hotelobj->insert();
            header('Location: formAdminhoteles');
            
        }

        $router->render('formAdminhoteles', [
            
            'hoteles' => $hoteles
        ]);
    }
  
}

