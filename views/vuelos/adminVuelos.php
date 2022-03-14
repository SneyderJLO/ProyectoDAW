<!-- Contenido principal -->
<section class="container mx-auto">
    <h2 class="text-3xl sm:text-subtitle text-center my-10">Panel de Administracion de Vuelos</h2>
    <!-- <img class="mx-auto rounded-lg" src="https://cdn.pixabay.com/photo/2017/06/05/11/01/airport-2373727_960_720.jpg" alt="vuelos"> -->

    <div class="w-4/5 flex justify-center mx-auto md:justify-start my-5">
        <a href="/admin/crearVuelo" class="block w-fit p-2 border-emerald-600 border-solid border-2 text-emerald-700 hover:text-white hover:bg-emerald-600 rounded-lg hover:font-bold font-semibold">Crear un Nuevo Vuelo</a>
    </div>

    <div class="md:grid-cols-2 md:w-4/5 mx-auto grid grid-cols-1 lg:grid-cols-3 text-center gap-5 my-10">

        <?php
        foreach ($vuelos as $vuelo) :
            $origen = ucfirst($vuelo['origen']);
            $destino = ucfirst($vuelo['destino']);
            $fechaSalida = $vuelo['fecha_salida'];
            $fechaRegreso = $vuelo['fecha_regreso'];
            $duracion = $vuelo['duracion'] == 1 ? $vuelo['duracion'] . ' hora' : $vuelo['duracion'] . ' horas';
            $precio = $vuelo['precio'];
        ?>
            <div class="rounded-lg p-2">
                <div class="vuelos-info">
                    <h3 class="text-3xl font-medium my-2"><?php echo "{$origen} a {$destino}" ?></h3>
                    <p class="my-5 text-left text-lg">Salida: <?php echo $fechaSalida ?></p>
                    <p class="my-5 text-left text-lg">Regreso: <?php echo isset($fechaRegreso) ?  $fechaRegreso : 'No Aplica' ?> </p>
                    <p class="my-5 text-left text-lg">Duración: <?php echo $duracion ?> </p>
                    <p class="my-5 text-right text-xl"><span class="font-bold text-2xl">USD <?php echo $precio ?></span> <?php echo isset($fechaRegreso) ?  'ida y vuelta' : 'solo ida' ?></p>
                </div>

                <div class="flex gap-5 justify-evenly w-full">
                    <a href="/admin/actualizarVuelo?id=<?php echo $vuelo['id']; ?>" class="text-indigo-500 font-medium rounded-md border-2 border-indigo-400 brder-solid px-4 py-2 block w hover:bg-indigo-500 hover:text-white transition-colors hover:cursor-pointer" type="button">Editar</a>

                    <form action="/admin/eliminarVuelo" method="POST">
                        <input type="hidden" name="id" value="<?php echo $vuelo['id'] ?>">

                        <button type="submit" class="text-rose-500 font-medium rounded-md border-2 border-rose-400 brder-solid px-4 py-2 block hover:bg-rose-500 hover:text-white transition-colors" type="button">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>