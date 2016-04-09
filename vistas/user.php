<script src="assets/js/user.js"></script>

 <div id="loading">
  <img id="loading-image" src="http://3.bp.blogspot.com/-JeGYJyA7z2k/VNUMuthhjDI/AAAAAAAAATk/LnNLV4OGz-A/s1600/iconoCargando-1-.gif"  alt="Loading..." />
  </div>
<div class="container-fluid">

	<form class="form-basic" id="formInscripcion" name="formInscripcion">

			<input type="hidden" name="ruta" id="ruta" value="solicitud">
            <div class="form-title-row">
                <h1>Formulario de peticiones y quejas</h1>
            </div>

             <div class="form-row">
                <label>
                    <span>Ciudad de los hechos</span>
                    <select name="ciudad" id="ciudad">
                        <option >Selecciona....</option>
                       	
                    </select>
                </label>
            </div>

           
            <div class="form-row">
                <label>
                    <span>Descripcion</span>
                    <textarea name="descripcion" id="descripcion"></textarea>
                </label>
            </div>
             <div class="form-row">
                <label>
                    <span>Selecciona archivo con todos los documentos en pdf</span>
                    <input type="file" name="file1" id="file1"></textarea>
                </label>
                
            </div>

            <div class="form-row">
               
                <input type="button" id="registrar" name="registrar" value="enviar"> 
            
            </div>



                       
        </form>


        <div id="cont_tabla_solicitudes">

        </div>

</div>