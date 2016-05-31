<script src="assets/js/asignador.js"></script>

 <div id="loading">
  <img id="loading-image" src="http://3.bp.blogspot.com/-JeGYJyA7z2k/VNUMuthhjDI/AAAAAAAAATk/LnNLV4OGz-A/s1600/iconoCargando-1-.gif"  alt="Loading..." />
  </div>
<div class="container-fluid">

    <div class="panel panel-default">
    
    <div class="panel-heading">Panel Asigancion de solicitudes</div>

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
            <h4 class="modal-title">Asignar solicitud</h4>
          </div>
          <div class="modal-body">
          							<form class="form-basic">

									<input type="hidden" id="id" name="id" value="">

									<div class="form-group">
                					
                					<label for="tipo"> Asignar      </label>

									<select name="tipo" id="tipo" class="form-control" >

									<option value="">...Seleccione un proceso</option>
			                        <option value="2">Atención a víctimas del delito y al ciudadano</option>
			                        <option value="3">Proteción y asistencia</option>
			                        <option value="4">Extinción del derecho de dominio</option>
			                        <option value="5">Investigación y judicialización</option>
			                        <option value="6">Justicia Transicional</option>
			                        <!--<option value="9">Asignador de solicitudes</option>-->

			                        </select>		
			                        </div>
			                        <div class="form-group">
               
						                <input class="form-control"  type="button" id="asigar_misional" name="asigar_misional" value="Asignar" > 
						            
						            </div>


		  </div>
		  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          
		
	</div>
</div>
    