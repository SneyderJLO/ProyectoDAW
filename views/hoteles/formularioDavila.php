<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/formulariohoteles.css">
    

    
    <title>Document</title>
</head>
<body class="fondo">
    



    <form id="formulario" class="form-registrar" novalidate>
        <h4>Reserva tu Hotel</h4>
        <div class="doble">
            <input autocomplete="off" class="controls" type="text" id="nombres" placeholder="Ingrese sus nombres">
            <div class="input-group">-</div>
            <input autocomplete="off" class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellido">
            <input autocomplete="off" class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su correo electronico">
            <div class="input-group">-</div>
            <input autocomplete="off" class="controls" type="number" name="celuar" id="celular" placeholder="Ingrese su numero de cedula">
            <input autocomplete="off" class="controls" type="number" name="numper" id="numper" placeholder="Numero de personas">
            <div class="input-group">-</div>

            <select id="selector" class="controlsOp" name="opciones">
            <option class="optionText" value="">Elija su hotel</option>
			<option class="optionText" value=""> Finch Bay - Galapagos</option>
			<option class="optionText" value="">Oro verde - Cuenca</option>
			<option class="optionText" value="">JW Marriot - Quito</option>
			<option class="optionText" value="">Mashpi Lodge - pastaza</option>
            </select>
            
        </div>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input id="box" type="checkbox"></p>
        
        <input type="submit"  class="boton" value="Reservar">
           

            
    </form>

   

    <!-- footer ↓ -->

    
</body>
</html>