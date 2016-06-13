<script src="assets/js/super.js"></script>

 <div id="loading">
  <img id="loading-image" src="http://3.bp.blogspot.com/-JeGYJyA7z2k/VNUMuthhjDI/AAAAAAAAATk/LnNLV4OGz-A/s1600/iconoCargando-1-.gif"  alt="Loading..." />
  </div>
<div class="container-fluid">

    <div class="panel panel-default">
    
    <div class="panel-heading">Panel Creación de gestores misionales</div>

    <div class="panel-body">

    <form class="form-basic" id="formInscripcion_misionales" name="formInscripcion_misionales">

            <div class="form-title-row">
                <h1>Formulario de registro usuarios procesos misionales</h1>
            </div>
            <input type="hidden" name="ruta" id="ruta" value="registar_usuario_misional">
             <div class="form-group">
                <label>
                    <span>Tipo de documento</span>
                   
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Numero de documento</span>
                    <input class="form-control"  type="text" name="documento" id="documento">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Nombre</span>
                    <input class="form-control"  type="text" name="nombre" id="nombre">
                </label>
            </div>

             <div class="form-group">
                <label>
                    <span>Apellidos</span>
                    <input class="form-control"  type="text" name="apellidos" id="apellidos">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Telefono celular</span>
                    <input class="form-control"  type="text" name="telefono_cel" id="telefono_cel">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Telefono Fijo</span>
                    <input class="form-control"  type="text" name="tel_fijo" id="tel_fijo">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Email</span>
                    <input class="form-control"  type="email" name="email" id="email">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Pais</span>
                    <select class="form-control"  name="pais" id="pais">
                        <option>Selecciona....</option>
                       
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Ciudad</span>
                    <select class="form-control"  name="ciudad" id="ciudad">
                        <option>Selecciona....</option>
                       
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Direccion</span>
                    <input class="form-control"  name="direccion" id="direccion"></textarea>
                </label>
            </div>
            <div class="form-group">
                <label>
                    <span>Poceso</span>
                    <select name="tipo" id="tipo">
                        <option value="">...Seleccione un proceso</option>
                        <option value="2">Atención a víctimas del delito y al ciudadano</option>
                        <option value="3">Proteción y asistencia</option>
                        <option value="4">Extinción del derecho de dominio</option>
                        <option value="5">Investigación y judicialización</option>
                        <option value="6">Justicia Transicional</option>
                        <option value="9">Asignador de solicitudes</option>
                       


                    </select>

                </label>
            </div>

            <div class="form-group">
               
                <input type="button" id="registrar" name="registrar" value="enviar"> 
            
            </div>

                       
        </form>

        </div>
    
    </div>
     <div class="panel panel-default">
            <div class="panel-heading">Panel edicion de gestores misionales</div>
            <div class="panel-body">
                    <div id="tabla_admin">
                  
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
            <h4 class="modal-title">Editar usuario</h4>
          </div>
          <div class="modal-body">
            
             <form class="form-basic">

            <input type="hidden" name="editar_id" id="editar_id" value="">
            

           
            <div class="form-group">
                <label>
                    <span>Nombre</span>
                    <input class="form-control"  type="text" name="nombre" id="editar_nombre">
                </label>
            </div>

             <div class="form-group">
                <label>
                    <span>Apellidos</span>
                    <input class="form-control"  type="text" name="apellidos" id="editar_apellidos">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Telefono celular</span>
                    <input class="form-control"  type="text" name="telefono_cel" id="editar_telefono_cel">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Telefono Fijo</span>
                    <input class="form-control"  type="text" name="tel_fijo" id="editar_tel_fijo">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <span>Email</span>
                    <input class="form-control"  type="email" name="email" id="editar_email">
                </label>
            </div>


            <div class="form-group">
                <label>
                    <span>Direccion</span>
                    <input class="form-control"  name="direccion" id="editar_direccion"></textarea>
                </label>
            </div>
            <div class="form-group">
                <label>
                    <span>Poceso</span>
                    <select class="form-control"  name="tipo" id="editar_tipo">
                        <option value="">...Seleccione un proceso</option>
                        <option value="2">Atención a víctimas del delito y al ciudadano</option>
                        <option value="3">Proteción y asistencia</option>
                        <option value="4">Extinción del derecho de dominio</option>
                        <option value="5">Investigación y judicialización</option>
                        <option value="6">Justicia Transicional</option>
                        <option value="9">Asignador de solicitudes</option>
                       


                    </select>

                </label>
            </div>

            <div class="form-group">
               
                <input class="form-control"  type="button" id="editar" name="editar" value="Editar" > 
            
            </div>

            </form>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

  </div>
</div>
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="modal_reporte" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generar Reporte</h4>
      </div>
      <div class="modal-body">
       
                            <form method="get" action="./controlador/crear_pdf.php" target="_blank" > 
                                <div class="form-group">
                                           
                                <label  for="tipo">Fecha inicial</label>
                                      
                                <input type="text"  id="fechai" name="fechai">

                                </div>  
                                
        

                                 <div class="form-group">
                                           
                                <label  for="tipo">Fecha Final</label>
                                      
                                <input type="text"  id="fechaf" name="fechaf">  
                                
                               

                                </div>
                                
                                 <div class="form-group">

                                 <select name="reporte_tipo">
                                    <option value="1">Reporte de solcitudes por area misional</option>
                                    <option value="2">Reporte detallado solicitudes</option>
                                    <option value="3">tiempos de respuesta</option>
                                 </select>

                                </div>

                                 <div class="form-group">
                
                                    <input class="form-control"  type="submit" id="reporte" name="reporte" value="Generar" > 
                                    
                                 </div>

                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>