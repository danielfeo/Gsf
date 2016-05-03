<script src="assets/js/super.js"></script>

 <div id="loading">
  <img id="loading-image" src="http://3.bp.blogspot.com/-JeGYJyA7z2k/VNUMuthhjDI/AAAAAAAAATk/LnNLV4OGz-A/s1600/iconoCargando-1-.gif"  alt="Loading..." />
  </div>
<div class="container-fluid">

    <form class="form-basic" id="formInscripcion_misionales" name="formInscripcion_misionales">

            <div class="form-title-row">
                <h1>Formulario de registro usuarios procesos misionales</h1>
            </div>
            <input type="hidden" name="ruta" id="ruta" value="registar_usuario_misional">
             <div class="form-row">
                <label>
                    <span>Tipo de documento</span>
                    <select name="tipo_documento" id="tipo_documento">
                        <option >Selecciona....</option>
                        <option value="Cedula de ciudadania">Cedula de ciudadania....</option>
                        <option value="Cedula extranjera">Cedula extranjera....</option>
                        <option value="Targeta de identidad">Targeta de identidad....</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Numero de documento</span>
                    <input type="text" name="documento" id="documento">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Nombre</span>
                    <input type="text" name="nombre" id="nombre">
                </label>
            </div>

             <div class="form-row">
                <label>
                    <span>Apellidos</span>
                    <input type="text" name="apellidos" id="apellidos">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Telefono celular</span>
                    <input type="text" name="telefono_cel" id="telefono_cel">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Telefono Fijo</span>
                    <input type="text" name="tel_fijo" id="tel_fijo">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Email</span>
                    <input type="email" name="email" id="email">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Pais</span>
                    <select name="pais" id="pais">
                        <option>Selecciona....</option>
                       
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Ciudad</span>
                    <select name="ciudad" id="ciudad">
                        <option>Selecciona....</option>
                       
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Direccion</span>
                    <input name="direccion" id="direccion"></textarea>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Poceso</span>
                    <select name="tipo" id="tipo">
                        <option value="">...Seleccione un proceso</option>
                        <option value="2">Atención a víctimas del delito y al ciudadano</option>
                        <option value="3">Proteción y asistencia</option>
                        <option value="4">Extinción del derecho de dominio</option>
                        <option value="5">Investigación y judicialización</option>
                        <option value="6">Justicia Transicional</option>
                       


                    </select>

                </label>
            </div>

            <div class="form-row">
               
                <input type="button" id="registrar" name="registrar" value="enviar"> 
            
            </div>

                       
        </form>
        <div id="tabla_admin">


        </div>

</div>