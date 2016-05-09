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
					
					public function insertar_solicitud($id_usuario,$ciudad,$descripcion,$filePath){

									$conexion = $this->conexion();

									$retorna = '';
									$consulta = "INSERT INTO
									 `gestor_solicitudes`.`solicitud`
									 (`id`,`dependencia`,`descripcion`,`fichero`,`id_usuario`,`estado`
									 	,`id_asignado`,`fk_id_ciudad`,`fk_cod_pais`,fecha`)
									  VALUES ( NULL,NULL,'$descripcion','$filePath','$id_usuario','0',NULL,'
									  	$ciudad','CO','".date("Y-m-d")."');";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Solicitud tramitada correctamente";
									} else {
									    $retorna .= "Solicitud no tramitada" . $conn->error;
									}


					}
					
					private function validar_estado($b){
						if($b==0){
						$r='images/espera.png';}
						if($b==1){
						$r='images/espera.png';
						}
						return $r;
					}
					public function listar_solicitudes(){

						$retorna='';

						$conexion = $this->conexion();

						session_start();

						$id_usuario = $_SESSION['id'];

					 	$consulta = "call sp_taer_solicitudes($id_usuario);";
						$retorna .= '<table id="listTable" border="1"  cellpadding="5">
					        <thead>
					            <tr>
					                <th>Descripción</th>
					                <th>Documento</th>
					                <th>Estado</th>
					                <th>Solicitado en</th>

					            </tr>
					        </thead>
				            <tbody><tr>';
						    
						    if ($resultado = $conexion->query($consulta)) {
						    while ($fila = $resultado->fetch_row()) {

						         $retorna .= '<td> '.$fila[2].' </td>
						         <td><a target="_blank" href="documentos/'.$fila[3].'">
						         <img height="42" src="http://icons.iconarchive.com/icons/graphicloads/filetype/128/pdf-icon.png"></a></td>
						         <td><img height="42" src="'.$this->validar_estado($fila[5]).'"></td><td>'.$fila[9].'</td>';
						  		  $retorna .= '</tr>';
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
					
					$retorna='';
					$rol='';
					session_start();

								$conexion = $this->conexion();

								$consulta = " CALL sp_logear('$doc','$clave'); ";

							   if ($resultado = $conexion->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								 		$_SESSION['id']=$fila[0];
								 		$_SESSION['nombre']=$fila[3];
								 		$_SESSION['apellido']=$fila[4];
								 		$_SESSION['rol']=$fila[13];
								 		if($fila[14]==0){$rol = 0;}else{
								 		$rol=$fila[13];
								 		}
								    }
							    $resultado->close();
								}

					return $rol;


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

							$consulta = "select * from Usuario where documento = $doc ";

							   if ($resultado = $conexion->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								        return 'El usuario ya existe';
								        exit();

								    }
							    $resultado->close();
								}

						$clave = $this->contra();

						$msg = 'Bienvenido al sistema su clave es: '.$clave;

						mail($mail,"Contraseña plataforma Fiscalia",$msg);

								


 
							   $consulta = "call sp_insertar_usuario('$tipo_doc','$doc','$nom','$ape','$cel','$fij','$pais','$ciudad','$direccion','$mail','$clave','8')";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Usuario Insertado";
									} else {
									    $retorna .= "Error Usuario no insertado: " . $conexion->error."$consulta ";
									}

								
							   return $retorna;

					}

					
}



?>