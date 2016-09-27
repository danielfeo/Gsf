<script src="assets/js/user.js"></script>

<div id="loading">
  <img id="loading-image" src="http://3.bp.blogspot.com/-JeGYJyA7z2k/VNUMuthhjDI/AAAAAAAAATk/LnNLV4OGz-A/s1600/iconoCargando-1-.gif"  alt="Loading..." />
</div>

<!--modal NO acepto-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Formulario de reenvio solicitud</h4>
      </div>
      <div class="modal-body">           
            <form id="form_reenvio">
              <div class="form-group">
                <label for="descripcion">Ingresa la descripcion de el no acuerdo a la respuesta </label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                <input type="hidden" id="dependencia" name="dependencia">
                <input type="hidden" id="fichero" name="fichero">
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="id_usuario" name="id_usuario">
                <input type="hidden" id="estado" name="estado">
                <input type="hidden" id="id_asignado" name="id_asignado">
                <input type="hidden" id="fk_id_ciudad" name="fk_id_ciudad">
                <input type="hidden" id="fk_cod_pais" name="fk_cod_pais">
                <input type="hidden" id="fecha" name="fecha">
                <input type="hidden" id="fecha_asignacion" name="fecha_asignacion">
                <input type="hidden" id="fecha_respuesta" name="fecha_respuesta">
                <input type="hidden" id="id_funcionario" name="id_funcionario">
                <input type="hidden" id="respuesta" name="respuesta">
                <input type="hidden" id="fichero_respuesta" name="fichero_respuesta">
              </div>
              <div class="form-group">
                <button type="submit"  id="reenviar" class="btn btn-info">Enviar</button>
              </div>
              
            </form>
      </div>
    
    </div>
  </div>
</div>
<!-- /.modal -->

<div class="container-fluid">

    <div class="panel panel-default">
    
    <div class="panel-heading">Panel Creación Solicitudes</div>

    <div class="panel-body">

	<form class="form-basic" id="formInscripcion" name="formInscripcion">

			<input  class="form-control" type="hidden" name="ruta" id="ruta" value="solicitud">
            <div class="form-title-row">
                <h1>Formulario de peticiones y quejas</h1>
            </div>

             <div class="form-group">
                <label>
                    <span>Tipo de solicitud</span>
                    <select name="tipo_solicitud" id="tipo_solicitud" title="Selecciona el tipo de solicitud que desea tramitar.">
                         <option >Selecciona....</option>
                         <option value="1" >Petición</option>
                         <option value="2" >Queja</option>
                         <option value="3" >Reclamo</option>
                         <option value="4" >Peticion</option>
                         <option value="5" >Solicitudes</option>
                    </select>
                </label>
            </div>
            <div class="form-group">
                <label>
                    <span>Descripcion</span>
                    <textarea name="descripcion" id="descripcion" title="Escribe una breve descripción de la solicitud."></textarea>
                </label>
            </div>
            
            <div class="form-group">
                <label>
                    <span>Ciudad de los hechos</span>
                    <select name="ciudad" id="ciudad" title="Selecciona la cidudad de los hechos.">
                        <option >Selecciona....</option>
                    </select>
                </label>
            </div>



            <div class="panel panel-default">
                
                     <div class="panel-heading">Selecciona archivo con todos los documentos en pdf</div>
                
              <div class="panel-body">
                    <input  type="file" name="file1" id="file1" title="selecciona el pdf con todos los documentos nesesarios identificacion y documentos de apoyo a la solicitud.">

            
            </div>
                
            </div>

            <div class="form-group">
               
                <input  class="form-control"  type="button" id="registrar" name="registrar" value="enviar"> 
            
            </div>

        </form>

        </div>
        </div>
        
        <div class="panel panel-default">
    
    <div class="panel-heading">Panel Solicitudes</div>

    <div class="panel-body">

        <div id="cont_tabla_solicitudes">

        </div>
    </div>
    </div>

</div>