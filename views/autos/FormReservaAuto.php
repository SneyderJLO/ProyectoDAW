
    <main id="main-formulario">
        <div id="contenedor-formulario">
            <h1 class="titulos-seccion Formulario"> Formulario de Reserva</h1>
            <div id="campos-ingreso">
                <form id="form-renta" onsubmit="return validarform();">
                    <div class="campos">
                        <label for="i-nombre">Nombre:</label>
                        <input type="text" id="i-nombre" name="nombre">
                    </div>
                    <div class="campos"><label for="i-apellido">Apellido:</label>
                        <input type="text" id="i-apellido" name="apellido">
                    </div>
                    <div class="campos">
                        <label for="t-telefono">Telefono:</label>
                        <input type="tel" id="t-telefono" name="telefono">
                    </div>
                    <div class="campos">
                        <label for="i-correo">Correo:</label>
                        <input type="email" id="i-correo" name="correo">
                    </div>
                    <div class="campos">
                        <label>Sexo:</label>
                        <div id="rdbuttongenero">
                            <input type="radio" id="s-femenino" name="sexo" value="femenino">
                            <label for="s-femenino" class="l-sexo">Femenino</label>
                     
                            <input type="radio" id="s-masculino" name="sexo" value="masculino">
                            <label for="s-masculino" class="l-sexo">Masculino</label>
                            
                        </div>
                        
                   
                    </div>
                    <div class="campos">
                        <label>Vehiculo Requerido:</label>
                        <select name="vehiculo" id="vehiculos">
                            <option selected disabled>Seleccione</option>
                            <option  value="Chevrolet Spark">Chevrolet Spark</option>
                            <option  value="Chevrolet Grand Vitara">Chevrolet Grand Vitara</option>
                            <option  value="Kia Picanto">Kia Picanto</option>
                            <option  value="Chevrolet Sail">Chevrolet Sail</option>
                            <option  value="Chevrolet Aveo Fam">Chevrolet Aveo Fam</option>
                        </select>
                    </div>
                    <div class="campos">
                        <div class="fechas">
                        <label for="d-fecha-desde">Fecha Desde:</label>
                        <input type="date" id="d-fecha-desde" name="fecha">
                        </div>
                        <div class="fechas">
                        <label for="d-fecha-hasta">Fecha Hasta:</label>
                        <input type="date" id="d-fecha-hasta" name="fecha">
                        </div>                       
                    </div>
                    <div id="privacidad">
                        <input type="checkbox" id="terminos">
                        <label>He leido y acepto la politica de privacidad</label>
                    </div>
                    <div id="botones">                   
                        <input type="submit" id="boton-enviar" value="Enviar">
                        <input type="reset" id="boton-limpiar" value="Limpiar">
                    </div>

                </form>
            </div>
        </div>

    </main>
    <script src="./bundle.js" ></script>
    <script type="text/javascript">
        function validarform() {
            var nombre, apellido, telefono, correo, sexo, vehiculo, fecha_desde, fecha_hasta, aceptar_term, expresion_correo, expresion_letras;
            nombre = document.getElementById("i-nombre");
            apellido = document.getElementById("i-apellido");
            telefono = document.getElementById("t-telefono");
            correo = document.getElementById("i-correo");
            sexo = document.getElementsByName("sexo");
            vehiculo = document.getElementById("vehiculos");
            fecha_desde = document.getElementById("d-fecha-desde");
            fecha_hasta = document.getElementById("d-fecha-hasta");
            aceptar_term = document.getElementById("terminos");
            expresion_correo = /\w+@\w+\.+[a-z]/;
            expresion_letras = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;

            /*expresion_correo=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;*/

            limpiarMensajes();

            //nombre
            if (nombre.value === "") {
                mensaje(" Campo nombre es obligatorio", nombre);
                return false;
            } else if (!(expresion_letras.test(nombre.value))) {
                mensaje(" Solo letras", nombre);
                return false;
            }else if (nombre.value.length > 20) {
                mensaje("Nombre maximo 20 caracteres", nombre);
                return false;
            }

            //apellido
            if (apellido.value === "") {
                mensaje(" Campo apellido es obligatorio", apellido);
                return false;
            } else if (!(expresion_letras.test(apellido.value))) {
                mensaje(" Solo letras", apellido);
                return false;
            }else if (apellido.value.length > 20) {
                mensaje("Apellido maximo 20 caracteres", apellido);
                return false;
            }

            //telefono
            if (telefono.value === "") {
                mensaje(" Campo telefono es obligatorio", telefono);
                return false;
            } else if (isNaN(telefono.value)) {
                mensaje(" El numero de telefono debe ser un numero ", telefono);
                return false;
            } else if (telefono.value.length > 10 || telefono.value.length < 10) {
                mensaje(" El numero de telefono debe tener 10 digitos", telefono);
                return false;
            }

            //correo
            if (correo.value === "") {
                mensaje(" Campo correo es obligatorio", correo);
                return false;
            } else if (!expresion_correo.test(correo.value)) {
                mensaje(" Escriba un correo válido", correo);
                return false;
            }

            //genero
            if (!(validar_genero(sexo))) {
                mensaje(" No ha escogido una opcion en sexo", sexo[0]);
                return false;
            }

            //vehiculo
            if (vehiculo.value === "Seleccione" || vehiculo.value === null) {
                mensaje(" Campo vehiculo es obligatorio", vehiculo);
                return false;

            }

            let datoD= fecha_desde.value;
            let fechaD= new Date(datoD);

            let datoH= fecha_hasta.value;
            let fechaH= new Date(datoH);

            let fechaAc= new Date();

            //fecha desde
            if (fecha_desde.value === "") {
                mensaje(" Campo fecha desde es obligatorio", fecha_desde);
                return false;
            }else if(fechaD<=fechaAc){              
                mensaje(" La fecha debe ser superior ", fecha_desde);
                return false;
            }
            //fecha hasta


            if (fecha_hasta.value === "") {
                mensaje(" Campo fecha hasta es obligatorio", fecha_hasta);
                return false;
            }else if(fechaH<=fechaD){              
                mensaje(" La fecha debe ser superior a la fecha desde", fecha_hasta);
                return false;
            }

            //terminos y condiciones
            if (!aceptar_term.checked) {
                mensaje(" Debe aceptar las politicas de privacidad", aceptar_term);
                return false;
            }
        }

        function validar_genero(radiobuttons) {

            for (i = 0; i < radiobuttons.length; i++) {
                if (radiobuttons[i].checked) {
                    return true;

                }
            } return false;

        }

        function mensaje(cadenaMensaje, elemento) {
            elemento.focus();
            var nodoPadre = elemento.parentNode;
            var nodoMensaje = document.createElement("span");
            nodoMensaje.textContent = cadenaMensaje;
            nodoMensaje.className = "mensajeError";
            nodoPadre.appendChild(nodoMensaje);

        }

        function limpiarMensajes() {
            var mensajes = document.querySelectorAll(".mensajeError");
            for (let i = 0; i < mensajes.length; i++) {
                mensajes[i].remove();
            }

        }

    </script>