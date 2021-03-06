<?php  

require('../modelo/bd.class.php'); 


class Usuario extends Db
{

					

					private function contra(){

									$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
									$cad = "";
									for($i=0;$i<8;$i++) {
									$cad .= substr($str,rand(0,62),1);
									}
									return $cad;

					}
					
					public function insertar_solicitud($tipo_solicitud,$id_usuario,$ciudad,$descripcion,$filePath){

									$conexion = $this->conexion();

									

								    $retorna = '';
									$consulta = "INSERT INTO
									 solicitud
									 (id,dependencia,descripcion,fichero,id_usuario,estado
									 	,id_asignado,fk_id_ciudad,fk_cod_pais,fecha)
									  VALUES ( NULL,'$tipo_solicitud','$descripcion','$filePath','$id_usuario','0',NULL,'$ciudad','CO','".date("Y-m-d")."');";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Solicitud tramitada correctamente";
									} else {
									    $retorna .= "Solicitud no tramitada" . $conexion->error;
									}
									return $retorna;

					}
					
						private function validar_estado($b){
						if($b==0){
						$r='<img height="42" src="images/espera.png" title="En espera">';}
						if($b==1){
						$r='<img height="42" src="images/asignado.png" title="La solicitud ha sido asignada">';
						}
						if($b==2){
						$r='<img height="42" src="images/solucion.png" title="La solicitud ha sido respondida">';
						}
						if($b==3){
						$r='<img height="42" src="images/reasing.png" title="La solicitud ha sido reasignada">';
						}
						return $r;
					}

					public function reasignar($id,$descripcion,$dependencia,$fichero,$id_usuario,$estado,$id_asignado,$fk_id_ciudad,$fk_cod_pais,$fecha,$fecha_asignacion,$fecha_respuesta,$id_funcionario,$respuesta,$fichero_respuesta){

									$conexion = $this->conexion();

									session_start();

									$retorna = '';

									$consulta = "update solicitud set estado = 3 where id = $id";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Solicitud editada correctamente";
									} else {
									    $retorna .= "Solicitud no editada" . $conexion->error;
									}

									$retorna = '';
									$consulta = "INSERT INTO
									 solicitud
									 (id,dependencia,descripcion,fichero,id_usuario,estado
									 	,id_asignado,fk_id_ciudad,fk_cod_pais,fecha)
									  VALUES ( NULL,NULL,'$descripcion','$fichero','$id_usuario','0',NULL,'$fk_id_ciudad','CO','".date("Y-m-d")."');";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Solicitud reasignada correctamente";
									} else {
									    $retorna .= "Solicitud no reasignada" . $conexion->error;
									}
									return $retorna;
					}



					public function listar_solicitud_id($id){

						$retorna='';

						$conexion = $this->conexion();

						session_start();

					    $array = array();

						$id_usuario = $_SESSION['id'];

						$consulta = "select * from solicitud where id=$id";

						if ($resultado = $conexion->query($consulta)) {
						     while($row =mysqli_fetch_assoc($resultado)){
						    	$array[] = $row;

						    }
						}

						return $array;

					}


					public function listar_solicitudes(){

						$retorna='';

						$conexion = $this->conexion();

						session_start();

						$id_usuario = $_SESSION['id'];

					 	$consulta = "call sp_taer_solicitudes($id_usuario);";
						
						$retorna .= '<table id="listTable" border="1"  cellpadding="5" class="table table-striped table-bordered dt-responsive nowrap" style="text-align: center;">
					        <thead>
					            <tr>
					                <th>Descripción</th>
					                <th>Documento</th>
					                <th>Estado</th>
					                <th>Solicitado en</th>
								    <th>Resuelto en</th>
								    <th>Respuesta</th>
								    <th>Area misional</th>
								    <th>Documeto Respuesta</th>
								    <th>Aprovación</th>

					            </tr>
					        </thead>
				            <tbody><tr>';
						    
						  if ($resultado = $conexion->query($consulta)) {
						    while ($fila = $resultado->fetch_row()) {

						         $retorna .= '<td><textarea> '.$fila[2].'</textarea> </td>
						         <td><a target="_blank" href="documentos/'.$fila[3].'">
						         <img height="42" src="http://icons.iconarchive.com/icons/graphicloads/filetype/128/pdf-icon.png"></a></td>
						         <td>'.$this->validar_estado($fila[5]).'</td>
						         <td>'.$fila[9].'</td>
						         <td>'.$fila[11].'</td>
						         <td><textarea>'.$fila[13].'</textarea></td>
						         <td>'.$fila[16].'</td>
						         <td>'.($fila[14]!=''?'<a target="_blank" href="documentos/'.$fila[14].'">':'').'<img height="42" src="http://icons.iconarchive.com/icons/graphicloads/filetype/128/pdf-icon.png"></a></td><td>'.($fila[5]==2?'<button type="button" id="no_acuerdo" data-id="'.$fila[0].'" title="Click si no estas de acuerdo con la respuesta esta opcion solo estara disponible 8 dias despues de ser resuelta la solicitud." class="btn btn-danger">No Acuerdo</button></td>':'');
						  		  $retorna .= '</tr><script>$( function() { $( document ).tooltip();} );</script>';
						    }
					    $resultado->close();
						}
						  $retorna .= '</tbody> </table>';

			 			return $retorna;

					}
	
					public function listar_pais()
					{
 								$retorna='';

								$conexion = $this->conexion();

							 	$consulta = "call sp_traer_paises();";

							   if ($resultado = $conexion->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<option value="'.$fila[0].'" >'.$fila[1].'</option>';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}

					public function logear($doc,$clave){
					$usuario= array();
					$retorna='';
					$rol='';
					session_start();

								$conexion = $this->conexion();

								$consulta = " CALL sp_logear('$doc','$clave'); ";
								$usuario=  array('rol' => 0,'nombre' => '', 'apellido' => '' );
							   if ($resultado = $conexion->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								 		$_SESSION['id']=$fila[0];
								 		$_SESSION['nombre']=$fila[3];
								 		$_SESSION['apellido']=$fila[4];
								 		$_SESSION['rol']=$fila[13];
								 		if($fila[14]==0){$rol = 0;}else{
								 		$rol=$fila[13];
								 		$usuario=  array('rol' => $rol,'nombre' => $fila[3], 'apellido' => $fila[4] );
								 		}
								    }
							    $resultado->close();
								}
					
					return json_encode($usuario);


					}

						public function listar_ciudad($pais)
					{
 								$retorna='';

								$conexion = $this->conexion();

								$consulta = " CALL `sp_traer_ciudades`('".$pais."'); ";

							   if ($resultado = $conexion->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<option value="'.$fila[0].'" >'.$fila[2].'</option>';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}


					public function registrar_usuario($tipo_doc,$doc,$nom,$ape,$cel,$fij,$mail,$pais,$ciudad,$direccion)

					{

						$retorna='';

						$conexion = $this->conexion();

							$consulta = "select * from usuario where documento = $doc ";

							   if ($resultado = $conexion->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								        return 'El usuario ya existe';
								        exit();

								    }
							    $resultado->close();
								}

						$clave = $this->contra();

						$msg = 'Bienvenido al sistema su clave es: '.$clave;

						//mail($mail,"Contraseña plataforma Fiscalia",$msg);

								


 
							   $consulta = "call sp_insertar_usuario('$tipo_doc','$doc','$nom','$ape','$cel','$fij','$pais','$ciudad','$direccion','$mail','$clave','8')";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Usuario Insertado su contraseña temporal es: ".$clave;
									} else {
									    $retorna .= "Error Usuario no insertado: " . $conexion->error."$consulta ";
									}

								
							   return $retorna;
							   

					}

					
}



?>