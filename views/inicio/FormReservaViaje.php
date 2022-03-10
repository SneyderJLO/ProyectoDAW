<!-- Formulario -->
<section class="formu" id="formul">
    <div class="formulario">
        <h3>RESERVA TU VIAJE AHORA</h3>
    </div>
    <form name="f" id="lario">
        <div class="field">
            <label for="nombres">Nombres</label>
            <input id="nombres" type="text" name="nombre">
            <p></p>
        </div>
        <div class="field">
            <label for="apellidos">Apellidos</label>
            <input id="apellidos" type="text" name="apellido">
            <p></p>
        </div>

        <div class="field">
            <label for="destino">Destino</label>
            <select id="destino">
                <option value="0" selected disabled>Selecione</option>
                <option>Quito</option>
                <option>Cuenca</option>
                <option>Baños</option>
                <option>Guayaquil</option>
                <option>Galápagos</option>
            </select>
            <p></p>
        </div>
        <div class="field">
            <label for="fecha">Fecha del viaje</label>
            <input id="fecha" type="date" name="fecha">
            <p></p>
        </div>
        <div class="field">
            <label for="email">E-mail</label>
            <input id="email" type="email" name="Email" placeholder="ej. minombre@gmail.com">
            <p></p>
        </div>
        <div class="field">
            <label for="telefono">Teléfono</label>
            <input id="telefono" type="number" name="telefono" placeholder="09- --- ----">
            <p></p>
        </div>
        <div class="textbox">
            <label>Sugerencias (opcional)</label>
            <textarea></textarea>
        </div>
        <div class="informacion">
            <label>¿Quieres recibir información de Viajes?</label>
            <div>
                <input type="radio" name="informacion" value="si">Si
                <p></p>
            </div>
            <div>
                <input type="radio" name="informacion" value="no">No

            </div>


        </div>
        <div class="privacidad">
            <input id="priva" type="checkbox" name="terminos">
            <p></p>
            <label>He leído y acepto la política de privacidad</label>
        </div>
        <div class="submit">
            <button>ENVIAR</button>
        </div>
    </form>

    <script src="js/BayasMarcos.js"></script>

    <!-- validacion de radiobutton -->
    <script>
        (function() {
            var formulario = document.getElementsByName("f")[0];
            elementos = formulario.elements,
                boton = document.getElementsByClassName("submit");

            var validarRadio = function(e) {
                if (f.informacion[0].checked == true || f.informacion[1].checked == true) {

                } else {
                    alert("Completa el campo ¿Quieres recibir informacion de viajes SI/NO?")
                }
            };
            var validarCheckbox = function(e) {
                if (f.terminos.checked == false) {
                    alert("Acepta la politica de privacidad")
                }

            };

            var validar = function(e) {
                validarRadio(e);
                validarCheckbox(e);
            }
            formulario.addEventListener("submit", validar);

        }())
    </script>

</section>