
<script src="assets/js/register.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h4>
					Bienvenido
				</h4>
				
				<h6>
					Al sistema Por favor <a class="btn btn-primary btn-large" id='btn_login'>Inicia sesion</a>  o registrate, por medio del siguiente formulario.
				</h6>
			</div>
		</div>
	</div>
			<form class="form-basic ">

            <div class="form-title-row">
                <h1>Formulario de registro</h1>
            </div>

             <div class="form-group">
                <label>
                    <span>Tipo de documento</span>
                    <select name="tipo_documento" id="tipo_documento" class="form-control">
                        <option >Selecciona....</option>
                       	<option value="Cedula de ciudadania">Cedula de ciudadania....</option>
                       	<option value="Cedula extranjera">Cedula extranjera....</option>
                       	<option value="Targeta de identidad">Targeta de identidad....</option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Numero de documento</span>
                    <input   class="form-control" type="text" name="documento" id="documento">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Nombre</span>
                    <input   class="form-control" type="text" name="nombre" id="nombre">
                </label>
            </div>

             <div class="form-group">
                <label>
                    <span>Apellidos</span>
                    <input   class="form-control" type="text" name="apellidos" id="apellidos">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Telefono celular</span>
                    <input   class="form-control" type="text" name="telefono_cel" id="telefono_cel">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Telefono Fijo</span>
                    <input   class="form-control" type="text" name="tel_fijo" id="tel_fijo">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Email</span>
                    <input   class="form-control" type="email" name="email" id="email">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Pais</span>
                    <select name="pais" id="pais"  class="form-control">
                        <option>Selecciona....</option>
                       
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Ciudad</span>
                    <select name="ciudad" id="ciudad"  class="form-control">
                        <option>Selecciona....</option>
                       
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Direccion</span>
                    <input   class="form-control" name="direccion" id="direccion"></textarea>
                </label>
            </div>

            <div class="form-group">
               
                <input   class="form-control" type="button" id="registrar" name="registrar" value="enviar"> 
            
            </div>

                       
        </form>
</div>