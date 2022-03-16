<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Tenemea Neysser" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página 2 -Formulario</title>
    <!-- Hoja de estilo interna  -->
    <script src="https://kit.fontawesome.com/5ad6b79db6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/Tenemea-Css-Formulario.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Hoja de estilo externa  -->
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>


    <div class="content1">
        <div class="container">

            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>

                        <tr>
                            <th scope="col">Pedido</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Detalles</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
            foreach ($gastronomia as $lista):
                $opciones = $lista['opciones'];
                $cantidad = $lista['cantidad'];
                $nombres = $lista['nombres'];
                $direccion = $lista['direccion'];
                $correo = $lista['correo'];
                $telefono = $lista['telefono'];
                $detalles = $lista['detalles'];

        ?>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>

                        <tr>
                            <td><?php echo $opciones?></td>
                            <td><?php echo $cantidad?></td>
                            <td><?php echo $nombres?></td>
                            <td><?php echo $direccion?></td>
                            <td><?php echo $correo?></td>
                            <td><?php echo $telefono?></td>
                            <td><?php echo $detalles?></td>
                            <td>


                                <div class="flex gap-5 justify-evenly w-full">

                                    <a href="/actualizarPedido?id=<?php echo $lista['id']; ?>"
                                        class="fa-solid fa-pen"></a>
                                    <form action="/eliminarPedido" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $lista['id'] ?>">

                                        <button type="submit" class="fa-solid fa-circle-minus" type="button"></button>
                                    </form>

                                </div>


                            </td>
                        </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
                <br>
                <a href="#formularioAgregar">
                    <button class="mibutton">Crear nuevo pedido</button>
                </a>
                <br>
            </div>

            <div style="clear:both;">
               
            </div>
        </div>
            </div>
        <div id="formGeneral">
            <!---->
            <div class="containerFormulario">
                <table id="tablaGeneral">

                    <thead>
                        <tr>
                            <th colspan="3">Lista de platillos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Parrillada Personal</td>
                            <td> - </td>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <td>Lomo de res</td>
                            <td> - </td>
                            <td>7.00</td>
                        </tr>
                        <tr>
                            <td>Chuleta a la parrilla</td>
                            <td> - </td>
                            <td>9.00</td>
                        </tr>
                        <tr>
                            <td> Apanado de pollo</td>
                            <td> - </td>
                            <td>6.00</td>
                        </tr>
                        <tr>
                            <td> Chivo al hueco </td>
                            <td> - </td>
                            <td>8.00</td>
                        </tr>
                        <tr>
                            <td>Cuy asado</td>
                            <td> - </td>
                            <td>24.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="containerFormulario" id="formularioAgregar">

                <form action="/crearPedido" class="form" method="POST">
                    <table style="text-align: center; margin: auto;">
                        <tr>
                            <td><strong>Opciones</strong> : </td>
                            <td>
                                <select required style="width: 100%;" name="opciones">
                                    <option value="">-- Selecciona --</option>
                                    <option value="Parrillada Personal">Parrillada Personal</option>
                                    <option value="Lomo de res">Lomo de res </option>
                                    <option value="Chuleta a la parrilla">Chuleta a la parrilla</option>
                                    <option value="Apanado de pollo">Apanado de pollo</option>
                                    <option value="Chivo al hueco">Chivo al hueco </option>

                                    <option>Cuy asado </option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <p>
                        <span>Cantidad de platos</span>
                        <input required id="valor" maxlength="3" onkeyup="validarNumero(this)" name="cantidad">
                    </p>
                    <p>
                        <span>Nombres:</span>
                        <input placeholder="**Neysser" id="txt" maxlength="20" minlength="5"
                            onkeyup="validarTexto(this)" required name="nombres">
                    </p>
                    <p>
                        <span>Dirección:</span>
                        <input placeholder="**Av. Macas" maxlength="10" minlength="0" required name="direccion">
                    </p>
                    <p>
                        <span>Correo electrónico:</span>
                        <input name="correo" placeholder="**neysser.tenemeal@ug.edu.ec" type="email" name="email"
                            id="email" onchange="validarCorreo(this.value);" required>
                    </p>
                    <div id="status">
                    </div>
                    <p>
                        <span>Teléfono celular :</span>
                        <input placeholder="09-  --- ----" maxlength="10" minlength="3" onkeyup="validarNumero(this)"
                            name="telefono">
                    </p>
                    <p>
                        <span>Agrega más detalles a tu pedido:</span>
                    </p>
                    <p></p>
                    <textarea name="detalles" required placeholder="Ingresa texto"></textarea>
                    <div></div>
                    <p>
                        <input type="checkbox" required onchange="this.setCustomValidity(validity.valueMissing ?
                     'Por favor, indica que aceptas los términos y condiciones.' : '');" id="terminosCondiciones">
                        <label>He leído y acepto los <a href="#"
                                title="Puedes leer los términos y condiciones haciendo click aquí!">términos y
                                condiciones
                            </a> para el pedido.</label><span class="req">* </span>
                    </p>

                    <button class="mibutton" type="submit">Registrar pedido</button>


                    <div style="clear: both;"></div>
                </form>
            </div>
            <div style="clear: both;">
                <br><br><br>
            </div>
        </div>
         

        <script src="./bundle.js"></script>
        <script src="js/Pagina2-Tenemea.js"></script>

</body>

</html>