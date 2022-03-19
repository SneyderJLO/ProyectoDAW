<link rel="stylesheet" href="styles/PrincipalEstilos.css" />
    
    <!-- Hoja de estilo externa  -->
    <link rel="stylesheet" href="styles/style.css"><br>
    <div class="reservas">
        <nav>
            <a href="presentarViaje">Reservaciones</a>
        </nav>
    </div>
    <section class="formu" id="formul">
        <div class="formulario">
            <h3>RESERVA TU VIAJE AHORA</h3>
            <!-- Formulario -->
            <form method="post" id="lario">
                <div class="field">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" required> 
                    <p></p>
                </div>
                <div class="field">
                    <label for="nombre">Nombre y Apellido</label>
                    <input  type="text" name="nombre" required> 
                    <p></p>
                </div>
                <div class="field">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña" required> 
                    <p></p>
                </div>
                <div class="field">
                    <label for="lugar">Destino</label>
                    <select name="destino" required>
                   <option>Quito</option> 
                   <option>Cuenca</option> 
                   <option>Baños</option> 
                   <option>Guayaquil</option> 
                   <option>Galápagos</option> 
                </select>
                </div>
                <div class="field">
                    <label for="fecha">Fecha del viaje</label>
                    <input  type="date" name="fecha" required> 
                    <p></p>              
                </div>
                <div class="field">
                    <label for="email">E-mail</label>
                    <input  type="email" name="email" placeholder="ej. minombre@gmail.com" required> 
                    <p></p>              
                </div>           
                <div class="field">
                    <label for="telefono">Teléfono</label>
                    <input type="number" name="telefono" placeholder="09- --- ----" required> 
                    <p></p>               
                </div>
                
                <div class="submit">
                    <button>AGREGAR</button>
                </div>
            </form> 
        </div>
    </section>
    
   
    
    
