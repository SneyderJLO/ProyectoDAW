
        <?php
        include_once 'vista/templates/header.php'; 
                            if (!isset($_SESSION)) {
                        session_start(); //iniciar la sesion
                    }
        
        ?>

        <main id="main-formulario">
        <div id="contenedor-formulario">
            <h1 class="titulos-seccion Formulario"> Agregar nuevo Vehiculo</h1>
            <div id="campos-ingreso">
                <form id="form-renta" method="POST" action="index.php?c=vehiculos&f=nuevo">
                    <div class="campos">
                        <label for="i-placa">Placa:</label>
                        <input type="text" id="i-placa" name="txtPlaca" required>
                    </div>
                    <div class="campos"><label for="i-color">Color:</label>
                        <input type="text" id="i-color" name="txtColor" required>
                    </div>
                    <div class="campos"><label for="i-modelo">Modelo:</label>
                        <input type="text" id="i-modelo" name="txtModelo" required>
                    </div>
                    <div class="campos"><label for="i-marca">Marca:</label>
                        <input type="text" id="i-marca" name="txtMarca" required>
                    </div>
                    <div class="campos"><label for="i-precioDia" >Precio/Día:</label>
                        <input type="number" step="any" id="i-precioDia" name="txtPrecioDia" required>
                    </div>
                    <div class="campos">
                        <label>Categoria:</label>
                        <select name="categoria" id="categorias" required>

                            <?php foreach ($categorias as $cat) {
                                ?>
                                <option value="<?php echo $cat['id_categoria_vehiculo'] ?>"><?php echo $cat["nombre"]; ?></option>
                                <?php
                            }
                            ?>   
                        </select>
                    </div>
                    <div>
                        <input type="checkbox"  name="aireacondicionado" value="1" id="aireacondicionado">
                        <label>Aire acondicionado?</label>
                    </div>
                    <div id="botones">                   
                        <input type="submit" id="boton-enviar" value="Agregar">
                        <a href="index.php?c=vehiculos&f=index" >Cancelar</a>
                    </div>
                    <h4 style="color: black">heeey</h4>

                    <?php
                    if (isset($_SESSION['mensaje'])) {
                        $color = $_SESSION['color'];
                        echo "<h4 style='color:$color'>";
                        echo $_SESSION['mensaje'];
                        echo "</h4>";
                        //eliminar una variable de la sesion
                        unset($_SESSION['mensaje']);
                    }
                    ?>
                    
                    
                </form>
            </div>
        </div>

    </main> 

