
                <main id="main-formulario">
                    <div id="contenedor-formulario">
                        <h1 class="titulos-seccion Formulario"> Editar Vehiculo</h1>
                        <div id="campos-ingreso">
                            <form id="form-renta" method="post" >
                                <div class="campos">
                                    <input type="hidden" name="id" value="<?php echo $fila['id_vehiculo'] ?>">
                                    <label for="i-placa">Placa:</label>
                                    <input type="text" id="i-placa" name="txtPlaca" required value="<?php echo $fila['placa'] ?> ">
                                    
                                </div>
                                <div class="campos"><label for="i-color">Color:</label>
                                    <input type="text" id="i-color" name="txtColor" required value="<?php echo $fila['color'] ?>">
                                </div>
                                <div class="campos"><label for="i-modelo">Modelo:</label>
                                    <input type="text" id="i-modelo" name="txtModelo" required value="<?php echo $fila['modelo'] ?>">
                                </div>
                                <div class="campos"><label for="i-marca">Marca:</label>
                                    <input type="text" id="i-marca" name="txtMarca" required value="<?php echo $fila['marca'] ?>">
                                </div>
                                <div class="campos"><label for="i-precioDia">Precio/Día:</label>
                                    <input type="number" step="any" id="i-precioDia" name="txtPrecioDia" required value="<?php echo $fila['precioDia'] ?>">
                                </div>
                                <div class="campos">
                                    <label>Categoria:</label>
                                    <select name="categoria" id="categorias">
                                        <?php
                                        foreach ($categorias as $cat){ 
                                        $selected='';
                                        if($cat['id_categoria_vehiculo']==$fila['id_categoria']){
                                            $selected = 'selected="selected"';
                                        }                                                                                
                                        echo "<option ".$selected."value='" .$cat['id_categoria_vehiculo']."'>".$cat["nombre"]."</option>";                                       
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <input type="checkbox"  name="aireacondicionado" value="<?php echo $fila['aire_acondicionado'] ?>" id="aireacondicionado"
                                    <?php echo ($fila['aire_acondicionado']==1)?'checked':'' ?>> 
                                    <label>Aire acondicionado?</label>
                                </div>
                                <div id="botones">                   
                                    <input type="submit" id="boton-enviar" value="Actualizar" onclick="if (!confirm('Esta seguro de modificar el productos')) return false;" >                                                                       
                                    <a href="index.php?c=vehiculos&a=index" class="btn btn-primary">Cancelar</a>
                                </div>

                            </form>
                        </div>

                    </div>
                 