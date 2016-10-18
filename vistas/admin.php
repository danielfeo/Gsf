<script src="assets/js/admin.js"></script>

 <div id="loading">
  <img id="loading-image" src="http://3.bp.blogspot.com/-JeGYJyA7z2k/VNUMuthhjDI/AAAAAAAAATk/LnNLV4OGz-A/s1600/iconoCargando-1-.gif"  alt="Loading..." />
  </div>
<div class="container-fluid">

    <div class="panel panel-default">
    
    <div class="panel-heading">Panel Respuesta  de solicitudes Dependencia: <label id="dependencia"></label></div>

        <div class="panel-body">
        
        <div id="asignacion">
    

        </div>
        

        </div>
    
    </div>
</div>



<div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">X</button>
            <h4 class="modal-title">Responder Solicitud</h4>
          </div>
          <div class="modal-body">
          	<form class="form-basic" id="formInscripcion" name="formInscripcion">

									<input type="hidden" id="id" name="id" value="">
                  <input  class="form-control" type="hidden" name="ruta" id="ruta" value="respuesta">

									      <div class="form-group">
                  					
                  				<label  for="tipo"> Responder  Solicitud </label>
          						      
                          <textarea lass="form-control"  id="texto_respuesta" name="texto_respuesta"></textarea>  

                        </div>

                        <div class="form-group">

                          <label for="fichero">
                            
                            Selecciona archivo de respuesta

                          </label>

                          <input lass="form-control"  type="file" accept="image/*" name="fichero" id="fichero"> 

			                  </div>


			                   <div class="form-group">
                
						                 <input class="form-control"  type="button" id="responder_solicitud" name="responder_solicitud" value="Responder" > 
						            
						            </div>
            </form>


		  </div>
		     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          
		
	</div>
</div>
</div>

