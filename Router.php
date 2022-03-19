<?php

class Router {

    public $rutasGet = [];
    public $rutasPost = [];

    // agrega las rutas al arrglo de rutasGet
    public function get( $url, $fn ){
        $this->rutasGet[$url] = $fn;
    }

    // agrega las rutas al arrglo de rutasPost
    public function post( $url, $fn ){
        $this->rutasPost[$url] = $fn;
    }

    // comprueba si la ruta existe en el array de rutas y ejecuta el metodo asociado
    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/inicio';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if( $metodo == 'GET' ) {
            $fn = $this->rutasGet[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPost[$urlActual] ?? null;
        }
        
        if($fn){
            // ejecutar la funcion que se le pase
            call_user_func( $fn, $this );
        }else{
            echo 'No existe la ruta';
        }
    }

    //Mostar una vista
    public function render( $view, $datos = [] ) {

        // foreach( $datos as $key => $value ) {
        //     // debuguear($key);
        //     $$key = $value; -> $$ significa varable de variable, crea una variable con el nombre de la key y le asigna el valor de la key
        // }

        extract($datos); // => extrae todas las llaves de un array y las convierte en variables

        ob_start(); //almacena la vista en memoria
        include __DIR__ . "./views/{$view}.php";

        $contenido = ob_get_clean(); //guarda la vista en la variable contenido y libera la memoria

        include __DIR__ . "./views/layout.php";
    }

}