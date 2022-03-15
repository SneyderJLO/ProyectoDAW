<?php

class AutosController {
/*    public static function index(Router $router) {
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
*/
    
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new VehiculoDAO();
    }

    public function index() { //para ir a la tabla
        // llamar al modelo, obtener los datos de rvehiculos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/vehiculo/vehiculoslist.php';
    }

    public function buscar() {
        // leer parametros
        if (!empty($_POST['busqueda'])) {
            $busq = htmlentities($_POST['busqueda']);
            //comunicarse con el modelo
            $resultados = $this->modelo->buscar($busq);
            // comunicarse con la vista
            require_once 'vista/vehiculo/vehiculoslist.php';
        }
    }

    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el vehiculo
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            if (!empty($_POST['txtPlaca']) && !empty($_POST['txtColor']) && !empty($_POST['txtModelo']) &&
                    !empty($_POST['txtMarca']) && !empty($_POST['txtPrecioDia']) && !empty($_POST['categoria'])) {


                $aireacondicionado = isset($_POST['aireacondicionado']) ? intval('1') : intval('0');

                $placa = htmlentities($_POST['txtPlaca']);
                $color = htmlentities($_POST['txtColor']);
                $marca = htmlentities($_POST['txtMarca']);
                $modelo = htmlentities($_POST['txtModelo']);
                $precioDia = number_format(doubleval(htmlentities($_POST['txtPrecioDia'])), 2, ".", "");
                $aire_acondicionado = $aireacondicionado;
                $id_categoria = intval(htmlentities($_POST['categoria']));

                //comuncarme con el modelo
                $exito = $this->modelo->insertar($placa, $color, $marca, $modelo, $precioDia, $aire_acondicionado, $id_categoria);
                $msj = 'Vehiculo guardado exitosamente';
                $color = 'black';
                if (!$exito) {
                    $msj = "No se pudo realizar el guardado";
                    $color = "red";
                }
                if (!isset($_SESSION)) {
                    session_start();
                };
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                //llamar a la vista
                //   $this->index();
                header('Location:index.php?c=vehiculos&f=index');
            } 
        } else {// mostrar el fomulario de nuevo vehiculo desde la vista de la tabla
            // cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasvehiculosDAO.php';
            $modeloCat = new CategoriasvehiculosDAO();
            $categorias = $modeloCat->listar();
            // comunicarse con la vista
            require_once 'vista/vehiculo/vehiculosnuevo.php';
        }
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {// editar
            // leer los parametros del formulario
            // verificaciones
            if (!empty($_POST['txtPlaca']) && !empty($_POST['txtColor']) && !empty($_POST['txtModelo']) &&
                    !empty($_POST['txtMarca']) && !empty($_POST['txtPrecioDia']) && !empty($_POST['categoria'])) {

                $aireacondicionado = isset($_POST['aireacondicionado']) ? intval('1') : intval('0');

                $id = htmlentities($_POST['id']);
                $placa = htmlentities($_POST['txtPlaca']);
                $color = htmlentities($_POST['txtColor']);
                $marca = htmlentities($_POST['txtMarca']);
                $modelo = htmlentities($_POST['txtModelo']);
                $precioDia = number_format(doubleval(htmlentities($_POST['txtPrecioDia'])), 2, ".", "");
                $aireacondicionado = $aireacondicionado;
                $categoria = intval(htmlentities($_POST['categoria']));

                //comuncarme con el modelo
                $exito = $this->modelo->actualizar($id, $placa, $color, $marca, $modelo, $precioDia, $aireacondicionado, $categoria);
                $msj = 'Vehiculo actualizado exitosamente';
                $color = 'blue';
                if (!$exito) {

                    $msj = "No se pudo realizar la actualizacion";
                    $color = "red";
                }
                if (!isset($_SESSION)) {
                    session_start();
                };
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                //llamar a la vista
                //   $this->index();
                header('Location:index.php?c=vehiculos&f=index');
            }
        } else {//mostrar el formulario de edicion cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasvehiculosDAO.php';
            $modeloCat = new CategoriasvehiculosDAO();
            $categorias = $modeloCat->listar();

            // leer parametros
            $id = $_GET['id'];
            //comunicarse con el modelo
            $fila = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/vehiculo/vehiculoseditar.php';
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            // leer parametros
            $id = htmlentities($_GET['id']);
            //llamar al modelo
            $exito = $this->modelo->eliminar($id);
            $msj = 'Vehiculo eliminado exitosamente';
            $color = 'black';
            if (!$exito) {
                $msj = "No se pudo realizar la eliminacion";
                $color = "red";
            }
            session_start();
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;

            //llamar a la vista
            // $this->index();
            //llamar a la vista
            header('Location:index.php?c=vehiculos&f=index');
        }// redireccionamiento, causa un cambio en la url
    }
}
