<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/formulariohoteles.css">
    <script src="https://kit.fontawesome.com/5ad6b79db6.js" crossorigin="anonymous"></script>
</head>
<form  method ="POST" class="form-registrar">
        <h4>Nuevo Hotel</h4>
        <div class="doble">
            <input required="" autocomplete="off" class="controls" type="text"  name="Nombrehotel" placeholder="Nombre de hotel" value="<?php echo ($lista) ? $lista['Nombrehotel'] : ''; ?>">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="text" name="ProvinciaCiudad"  placeholder="Provincia - Ciudad" value="<?php echo ($lista) ? $lista['ProvinciaCiudad'] : ''; ?>">
            <input required="" autocomplete="off" class="controls" type="email" name="Email"  placeholder="Correo electronico Hotel" value="<?php echo ($lista) ? $lista['Email'] : ''; ?>">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="number" name="NumeroCuartos"  placeholder="Número de cuartos" value="<?php echo ($lista) ? $lista['NumeroCuartos'] : ''; ?>">
            <div>
            <input required="" type="radio" name="TipoHotel" id='playa' value = 'Hotel playero'<?php echo $lista["TipoHotel"]== "Hotel playero"?"checked=\"checked\"":'';?>>
            <label for="playa">Hotel Playero</label>
            <input required="" type="radio" name="TipoHotel" id='ciudad' value = 'Hotel de ciudad'<?php echo $lista["TipoHotel"] == "Hotel de ciudad"?"checked=\"checked\"":'';?> >
            <label for="ciudad">Hotel de Ciudad</label>
           
            </div>

            <div class="input-group">-</div>

            <select required="" id="selector" class="controlsOp" name="Estrellas" >
            <option class="optionText" value="">Tipo de Hotel</option>
			<option class="optionText" value="5 estrellas"
            
            <?php if($lista['Estrellas'] == "5 estrellas"){
                echo "selected";}
                
                ?>
            >5 Estrellas</option>
			<option class="optionText" value="4 estrellas"
            
            <?php if($lista['Estrellas'] == "4 estrellas"){
                echo "selected";}
                
                ?>
            >4 Estrellas</option>
			<option class="optionText" value="3 estrellas"
            <?php if($lista['Estrellas'] == "3 estrellas"){
                echo "selected";}
                
                ?>

            >3 Estrellas </option>
			<option class="optionText" value="2 estrellas"
            <?php if($lista['Estrellas'] == "2 estrellas"){
                echo "selected";}
                
                ?>
            
            >2 Estrellas</option>
            </select>
            
        </div>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input  required="" id="box" type="checkbox" checked="true" disabled="disabled"  ></p>
        
        <input type="submit"  class="boton" value="Actualizar" name="update"> 
        <!-- <button class="boton" name = "update" >Actualizar</button> -->
        
        
            
    </form>