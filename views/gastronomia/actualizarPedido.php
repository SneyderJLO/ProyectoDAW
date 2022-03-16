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
    <section class="container mx-auto">
        <h2 class="text-3xl sm:text-subtitle text-center my-10">Editar pedido</h2>

        <form method="POST" class="form">
            <table style="text-align: center; margin: auto;">
                <tr>
                    <td><strong>Opciones</strong> : </td>
                    <td>
                        <select required style="width: 100%;" name='opciones'>
                            <option value="" disabled selected>-- Selecciona --</option>


                            <option value="Parrillada Personal" <?php if($lista['opciones'] == "Parrillada Personal"){
                echo "selected";}
                ?>>Parrillada Personal </option>
                            <option value="Lomo de res" <?php if($lista['opciones'] == "Lomo de res"){
                echo "selected";}
                ?>>Lomo de res </option>
                            <option value="Chuleta a la parrilla" <?php if($lista['opciones'] == "Chuleta a la parrilla"){
                echo "selected";}
                ?>>Chuleta a la parrilla </option>
                            <option value="Apanado de pollo" <?php if($lista['opciones'] == "Apanado de pollo"){
                echo "selected";}
                ?>>Apanado de pollo </option>
                            <option value="Chivo al hueco" <?php if($lista['opciones'] == "Chivo al hueco"){
                echo "selected";}
                ?>>Chivo al hueco </option>
                            <option value="Cuy asado" <?php if($lista['opciones'] == "Cuy asado"){
                echo "selected";}
                ?>>Cuy asado </option>




                        </select>
                    </td>
                </tr>
            </table>
            <p>
                <span>Cantidad de platos</span>
                <input required id="valor" maxlength="3" onkeyup="validarNumero(this)" name='cantidad'
                    value="<?php echo ($lista) ? $lista['cantidad'] : ''; ?>">
            </p>
            <p>
                <span>Nombres:</span>
                <input placeholder="**Neysser" id="txt" maxlength="20" minlength="5" onkeyup="validarTexto(this)"
                    required name='nombres' value="<?php echo isset($lista) ? $lista['nombres'] : ''; ?>">
            </p>
            <p>
                <span>Dirección:</span>
                <input placeholder="**Av. Macas" maxlength="10" minlength="0" required name='direccion'
                    value="<?php echo isset($lista) ? $lista['direccion'] : ''; ?>">
            </p>
            <p>
                <span>Correo electrónico:</span>
                <input placeholder="**neysser.tenemeal@ug.edu.ec" name='correo' type="email" name="email" id="email"
                    onchange="validarCorreo(this.value);" required
                    value="<?php echo isset($lista) ? $lista['correo'] : ''; ?>">
            </p>
            <div id="status">
            </div>
            <p>
                <span>Teléfono celular :</span>
                <input placeholder="09-  --- ----" maxlength="10" minlength="3" onkeyup="validarNumero(this)"
                    name='telefono' value="<?php echo isset($lista) ? $lista['telefono'] : ''; ?>">
            </p>
            <p>
                <span>Agrega más detalles a tu pedido:</span>
            </p>
            <p></p>
            <textarea name="detalles" required
                placeholder="Ingresa algo de texto."><?php echo isset($lista) ? $lista['detalles'] : ''; ?></textarea>
            <div></div>
            <button class="mibutton" type="submit">Actualizar pedido</button>

        </form>
    </section>
    <br><br>
    <script src="./bundle.js"></script>
        <script src="js/Pagina2-Tenemea.js"></script>
</body>

</html>