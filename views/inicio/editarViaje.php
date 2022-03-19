<link rel="stylesheet" href="styles/PrincipalEstilos.css" />
    
    <!-- Hoja de estilo externa  -->
    <link rel="stylesheet" href="styles/style.css"><br>
<div class="reservas">
    <nav>
        <a href="presentarViaje">Reservaciones</a>
    </nav>
</div>

<section class="formu" id="formul">
    <div class= "formulario">
        <h3>Actualización de Reservaciones</h3>
        <form method="post">
        <input type="hidden" name="id2" value="<?php echo $lista['id'] ?>">
            <div class="field">
                <label>Usuario:</label>
                <input type="text" name="usuario" required value="<?php echo isset($lista) ? $lista['usuario']: ''; ?>">
            </div>
            <div class="field">
                <label>Nombre:</label>
                <input type="text" name="nombre" required value="<?php echo isset($lista) ? $lista['nombre'] : '';?>">
            </div>
            <div class="field">
                <label>Contraseña:</label>
                <input type="password" name="contraseña" required value="<?php echo isset($lista) ? $lista['contraseña'] : '';?>">
            </div>
            <div class="field">
                <label for="lugar">Destino</label>
                <input  type="text" name="destino" required  value="<?php echo isset($lista) ? $lista['destino'] : '';?>">         
            </div>
            <div class="field">
                <label>Fecha del Viaje:</label>
                <input type="date" name="fecha"  value="<?php echo isset($lista) ? $lista['fecha_viaje'] : '';?>">
            </div>
            <div class="field">
                <label>Email:</label>
                <input type="email" name="email"  required value="<?php echo isset($lista) ? $lista['email'] : '';?>">
            </div>
            <div class="field">
                <label>telefono:</label>
                <input type="number" name="telefono" required value="<?php echo isset($lista) ? $lista['telefono'] : '';?>">
            </div>
                        
            <div class="submit">
                <button>ACTUALIZAR</button>
            </div>
        </form>

    </div>
</section>
    
    



<
