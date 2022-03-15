
        <h1 class="titulos-seccion Formulario">Vehiculos</h1>
        <div>
            <div>
                <form action="index.php?c=vehiculos&f=buscar" method="POST">
                    <input type="text" name="busqueda" id="busqueda"  placeholder="buscar x marca..."/>
                    <button class="button" type="submit">Buscar</button>
                </form>       
            </div>
            
            <div id="botonfinal">
                <a class="button" id="buttonAgregar" href="index.php?c=vehiculos&f=nuevo">Agregar +</a>
            </div>
            
        </div>
        <div id="tabla-contenedor">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>PLACA</th>
                        <th>COLOR</th>
                        <th>MODELO</th>
                        <th>MARCA</th>
                        <th>PRECIO/DIA</th>
                        <th>CATEGORIA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resultados as $fila) {
                        ?>
                    <tr>
                        <td><?php echo $fila['placa'] ?></td>
                        <td><?php echo $fila['color'] ?></td>
                        <td><?php echo $fila['marca'] ?></td>
                        <td><?php echo $fila['modelo'] ?></td>
                        <td><?php echo $fila['precioDia'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td>
                            <a class="button" id="buttonEditar" href="index.php?c=vehiculos&f=editar&id=<?php echo $fila['id_vehiculo'] ?>">Editar</a>
                            <a class="button" id="buttonEliminar" onclick="if (!confirm('Esta seguro de eliminar el vehiculo?'))
                                        return false;" href="index.php?c=vehiculos&f=eliminar&id=<?php echo $fila['id_vehiculo'] ?>">Eliminar</a>
                        </td>

                    </tr>
                    <?php } ?>

                </tbody>
            </table>


        </div>

