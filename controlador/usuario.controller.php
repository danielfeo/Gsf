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

					public function listar_horario()
					{
 								$retorna='';

								$escenarios = $this->conn();

							 	$consulta = "SELECT * FROM `TB_HORARIO` ";

							   if ($resultado = $escenarios->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<option value="'.$fila[0].'" >'.utf8_encode($fila[1]).'</option>';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}

					public function listar_sector()
					{
 								$retorna='';

								$escenarios = $this->conn();

							 	$consulta = "SELECT * FROM `TB_SECTOR` ";

							   if ($resultado = $escenarios->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<option value="'.$fila[0].'" >'.utf8_encode($fila[1]).'</option>';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}


					public function eliminar_concepto_id($a)
					{
 								$retorna='';

								$escenarios = $this->conn();



							 	$consulta = "DELETE FROM TB_TARIFA WHERE `PK_I_ID_TARIFA`=".$a.";";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= "Concepto eliminado";
									} else {
									    $retorna .= "Error el resgistro no Concepto eliminado: " . $conn->error;
									}

									$escenarios->close();

							     

							  return $retorna;
					}

					public function eliminar_sector_tarifa($a)
					{
 								$retorna='';

								$escenarios = $this->conn();



							 	$consulta = "DELETE FROM TB_SECTOR_TARIFA WHERE `PK_I_ID_SECTOR_TARIFA`=".$a.";";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= "Concepto eliminado";
									} else {
									    $retorna .= "Error el resgistro no Concepto eliminado: " . $conn->error;
									}

									$escenarios->close();

							     

							  return $retorna;
					}


					public function listar_tarifas($a,$b)
					{
 								$retorna='';

								$escenarios = $this->conn();

							 	$consulta = "call SP_TB_TARIFA_CONSULTAR_D('".$a."','".$b."');";

							   if ($resultado = $escenarios->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<tr>
								         <td>'.utf8_encode($fila[2]).'</td>
								         <td>'.utf8_encode($fila[1]).'</td>
								         <td>'.utf8_encode($fila[3]).'</td>
								         <td>'.$fila[4].'</td>
								         <td><a class="btn btn-primary" id="edit_concepto" data-id="'.$fila[5].'" >Editar</a> 
								         <td><a class="btn btn-primary" id="delete_concepto" data-id="'.$fila[5].'"  >Eliminar</a></td>
								         </tr>
								         ';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}

					public function listar_tarifas_id($a)
					{
 								$retorna='';

								$escenarios = $this->conn();

							 	$consulta = "SELECT * FROM `TB_TARIFA` WHERE `FK_I_ID_ESCENARIO`=".$a." ";

							   if ($resultado = $escenarios->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<option value="'.$fila[0].'" >'.utf8_encode($fila[2]).'</option>';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}


					public function devuelve_slmv($a,$b)
					{
 								$retorna='';

								$escenarios = $this->conn();

							 	$consulta = "call SP_TB_SMLV_CONSULTA('".$a."','".$b."');";
 
							   if ($resultado = $escenarios->query($consulta)) {
								    while ($fila = $resultado->fetch_row()) {
								         $retorna .= '<form id="edicion_slmv" name="edicion_slmv">
								         			  <div class="form-group">
								         			  <label for="slmv"><h4>Editar Slmv:</h4></label>
								         			  <input class="form-control" id="slmv" name="slmv" class="form-control" type="text" value="'.$fila[0].'">
								         			  <input id="id_sector_tarifa" name="id_sector_tarifa" type="hidden" value="'.$fila[1].'">
								         			  <label for="nombre_tarifa"><h4>Editar nombre concepto:</h4></label>
								         			  <input class="form-control" id="nombre_tarifa" name="nombre_tarifa" type="text" value="'.utf8_encode($fila[5]).'">
								         			  <input id="id_tarifa" name="id_tarifa" type="hidden" value="'.$fila[3].'">
								         			  <br>
								         			  <input class="btn btn-primary" name="editar_smlv" id="btn_editar_slmv" type="button" value="Editar">
								         			  </div>
								         			  <script>llamado();</script>
								         			  </form>
								         			  ';
								    }
							    $resultado->close();
								}
					 return $retorna;
					}

					public function edita_slmv($a,$b,$c,$d)
					{
 								$retorna='';

								$escenarios = $this->conn();



							 	$consulta = "UPDATE TB_SECTOR_TARIFA
							 	SET `I_SMLMV`='".$a."' 
							 	WHERE `PK_I_ID_SECTOR_TARIFA`='".$b."'; ";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= "SMLV actualizado";
									} else {
									    $retorna .= "Error el resgistro no fue actualzado: " . $conn->error;
									}

								$consulta = "UPDATE `TB_TARIFA` SET `V_CONCEPTO`='".$d."' WHERE `PK_I_ID_TARIFA`='".$c."'; ";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= " y nuevo nombre concepto";
									} else {
									    $retorna .= " Error el nombre concepto no fue actualizado" . $conn->error;
									}
									

							     $consulta = "CALL SP_TB_SECTOR_TARIFA_ACTUALIZAR_VALOR();";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= "";
									} else {
									    $retorna .= " Error al actualizar valores" . $conn->error;
									}

									$escenarios->close();

										/** 
								seguridad
								**/
								session_start();
								/*usar solo al editar o al eliminar*/
								/*
								$result=$conn->query($sql1);
								$data = array();
								while ( $row = $result->fetch_assoc() ){
								    $data[] = json_encode($row);
								}
								$antes = json_encode( $data );
								*/
								/*fin usar solo al editar eliminar*/
								$con_seg= $this->Conexion_seguridad();
								$miArray = array('FK_I_ID_SECTOR'=> $a,'FK_I_ID_TARIFA'=> $b,'D_TOTAL_REDONDEADO' => $c,'FK_I_ID_HORARIO' => $c,'I_SMLMV' => $d);
								$datos=json_encode($miArray);
								$sql="CALL SP_Insetar_Seguridad('28','".date('Y-m-d H:i:s')."','".$_SESSION['Id_Usuario']."','TB_SECTOR_TARIFA','insertar','','".$datos."','".$_SERVER['REMOTE_ADDR']."');";
								$con_seg->query($sql);

								
								/** 
								fin seguridad
								**/

							  return $retorna;
					}

					public function insertar_concepto($a,$b,$c)
					{
 								$retorna='';

								$escenarios = $this->conn();
 
								$b=utf8_decode($b);

							 	$consulta = "INSERT INTO TB_TARIFA(
												`FK_I_ID_UNIDAD` ,
												`V_CONCEPTO` ,
												`FK_I_ID_ESCENARIO`
												)
												VALUES (
												'".$a."', '".$b."', '".$c."'
												);";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= "Concepto Insertado";
									} else {
									    $retorna .= "Error Concepto no Insertado: " . $conn->error;
									}

								/*seguridad*/
								session_start();
								$con_seg= $this->Conexion_seguridad();
								$miArray = array('FK_I_ID_UNIDAD'=> $a,'V_CONCEPTO'=> $b,'FK_I_ID_ESCENARIO' => $c);
								$datos=json_encode($miArray);
								$sql="CALL SP_Insetar_Seguridad('28','".date('Y-m-d H:i:s')."','".$_SESSION['Id_Usuario']."','TB_TARIFA','insertar','','".$datos."','".$_SERVER['REMOTE_ADDR']."');";
								$con_seg->query($sql);
								/*fin seguridad*/

									$escenarios->close();

							     

							  return $retorna;
					}


						public function insertar_tarifa($a,$b,$c,$d)
					{			
 								$retorna='';

								$escenarios = $this->conn();
 								
								$salario_min = $this->traer_salario_minimo();
								$salario_min =$salario_min*$d;
								$aprox = round($salario_min, -2); 
								
							 	$consulta = "INSERT INTO 
							 	`TB_SECTOR_TARIFA`(`FK_I_ID_SECTOR`,`FK_I_ID_TARIFA`,`D_TOTAL_REDONDEADO`,`FK_I_ID_HORARIO`,`I_SMLMV`) 
							 	VALUES ( '".$a."','".$b."',".$aprox.",'".$c."','".$d."');";
 								
									if ($escenarios->query($consulta) === TRUE) {
									    $retorna .= "Concepto y tarifa Insertado";
									} else {
									    $retorna .= "Error Concepto y tarifa no Insertado: " . $conn->error;
									}

								/** 
								seguridad
								**/
								session_start();
								$con_seg= $this->Conexion_seguridad();
								$miArray = array('FK_I_ID_SECTOR'=> $a,'FK_I_ID_TARIFA'=> $b,'D_TOTAL_REDONDEADO' => $c,'FK_I_ID_HORARIO' => $c,'I_SMLMV' => $d);
								$datos=json_encode($miArray);
								$sql="CALL SP_Insetar_Seguridad('28','".date('Y-m-d H:i:s')."','".$_SESSION['Id_Usuario']."','TB_SECTOR_TARIFA','insertar','','".$datos."','".$_SERVER['REMOTE_ADDR']."');";
								$con_seg->query($sql);

								/*usar solo al editar o al eliminar*/
								/*
								$result=$conn->query($sql1);
								$data = array();
								while ( $row = $result->fetch_assoc() ){
								    $data[] = json_encode($row);
								}
								echo json_encode( $data );
								*/
								/** 
								fin seguridad
								**/


									$escenarios->close();
								
							     

							  return $retorna;

					}

}



?>