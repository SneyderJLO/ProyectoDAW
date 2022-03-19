<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/PrincipalEstilos.css" />
    
    <!-- Hoja de estilo externa  -->
    <link rel="stylesheet" href="styles/style.css">
    <title>Reservaciones CRUD</title> 
</head>
 <!-- Header -->
 <header class="bg-black p-2">
        <div class="container flex items-center flex-col sm:flex-row justify-between mx-auto text-white">
            <a href="inicio" class="flex items-center">
                <h1 class="my-2 text-4xl sm:ml-0 sm:text-title sm:leading-none ">EcuTravel</h1>
                <i class="fas fa-plane-departure text-2xl sm:text-logo ml-2"></i>
            </a>

            <i id="bar" class="block text-3xl sm:hidden fas fa-bars"></i>

            <nav id="nav" class="opacity-0 h-0 invisible sm:visible sm:h-auto sm:opacity-100 sm:flex gap-2 flex-col text-center sm:flex-row sm:justify-between sm:gap-4 sm:text-2sm transition-all duration-300 ease-in-out">
                <a class="hover:text-orange-500 text-lg sm:text-base" href="AgregarViaje">Reserva de Viaje</a>    
                <a class="hover:text-orange-500 text-lg sm:text-base" href="vuelos">Vuelos</a>
                <a class="hover:text-orange-500 text-lg sm:text-base" href="hoteles">Hoteles</a>
                <a class="hover:text-orange-500 text-lg sm:text-base" href="autos">Reserva de Autos</a>
                <a class="hover:text-orange-500 text-lg sm:text-base" href="gastronomia">Gastronomia</a>
            </nav>
        </div>
    </header>
<body>
    <div class="formulario">
            <h3>-RESERVACIONES-</h3>
      
     <!-- CONSULTAR -->   
        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>NOMBRE Y APELLIDO</th>
                        <th>DESTINO</th>
                        <th>FECHA DEL VIAJE</th>
                        <th>E-MAIL</th>
                        <th>TELEFONO</th>
                        <th>ACCIONES</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
            foreach ($reserva as $lista):
                $usuario = $lista['usuario'];
                $nombre = $lista['nombre'];
                $destino = $lista['destino'];
                $fecha = $lista['fecha_viaje'];
                $email = $lista['email'];
                $telefono = $lista['telefono'];
            ?>
                        <tr>
                            <td><?php echo $usuario?></td>
                            <td><?php echo $nombre?></td>
                            <td><?php echo $destino?></td>
                            <td><?php echo $fecha?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $telefono?></td>
                            <td>
                            <div class="flex gap-5 justify-evenly w-full">

                                <a class= "boton" href="editarViaje?id=<?php echo $lista['id']; ?>"
                                    class="fa-solid fa-pen">Editar</a>
                                <form class="boton" action="eliminarReserva" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $lista['id'] ?>">
                                    <button type="submit" onclick="if (!confirm('Esta seguro de eliminar la Reservación?'))
                                        return false;" type="button">Eliminar</button>
                                </form>

                            </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                   
            <a class="buton" href="AgregarViaje">AGREGAR +</a><br>
            
        </div><br>
        </div>
       
</body>
</html>