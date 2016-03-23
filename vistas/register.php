
<script src="assets/js/register.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1>
					Bienvenido
				</h1>
				
				<h4>
					Al sistema Por favor <a class="btn btn-primary btn-large" href="http://www.layoutit.com/build#">Inicia sesion</a>  o registrate, por medio del siguiente formulario.
				</h4>
			</div>
		</div>
	</div>
			<form class="form-basic">

            <div class="form-title-row">
                <h1>Formulario de resgistro</h1>
            </div>

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
               
                <input type="button" id="registrar" name="registrar" value="enviar"> 
            
            </div>

                       
        </form>
</div>