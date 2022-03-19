<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/style.css">
    <?php echo isset($estilos) ? $estilos : '' ?>
    <title>EcuTravel</title>
</head>

<body>
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

    <?php
        echo $contenido;
    ?>

    <!-- Footer -->
    <footer class="bg-black">
        <div class="container mx-auto flex items-center justify-center flex-col p-2">
            <a href="/" class="text-white">
                <i class="text-3xl fas fa-plane-departure"></i>
            </a>
            <p class="text-white text-sm">Todos los Derechos Reservados EcuTravel &copy;</p>
        </div>
    </footer>
    <script src="./bundle.js"></script>
</body>

</html>