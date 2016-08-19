<?php  

require('../modelo/bd.class.php'); 


class Super extends Db
{

					

					private function contra(){

					$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$cad = "";
					for($i=0;$i<8;$i++) {
					$cad .= substr($str,rand(0,62),1);
					}
					return $cad;

					}
					
			
					public function listar_admin(){

						$retorna='';

						$conexion = $this->conexion();

						session_start();

						$id_usuario = $_SESSION['id'];

					 	$consulta = "select * from usuario where rol BETWEEN 2 and 7 or rol = 9 or rol = 10 ";
						$retorna .= '<table id="admin_table" border="1"  cellpadding="5">
					        <thead>
					            <tr>
					                <th>Documento</th>
					                <th>Nombre</th>
					                <th>Apellidos</th>
					                <th>Mail</th>
					                <th>Clave</th>
					                <th>Proceso misional</th>
					                <th>Editar</th>
					                <th>Inhabilitar</th>


					            </tr>
					        </thead>
				            <tbody>';
						    
						    if ($resultado = $conexion->query($consulta)) {
						    while ($fila = $resultado->fetch_row()) {

						 if ($fila[13] ==  2){ $misional= "Atención a víctimas del delito y al ciudadano ";  }
                         if ($fila[13] ==  3){ $misional= "Proteción y asistencia ";  }
                         if ($fila[13] ==  4){ $misional= "Extinción del derecho de dominio ";  }
                         if ($fila[13] ==  5){ $misional= "Investigación y judicialización ";  }
                         if ($fila[13] ==  6){ $misional= "Justicia Transicional ";  }
                         if ($fila[13] ==  9){ $misional= "Asignador solicitudes ";  } 
                         if ($fila[13] ==  10){ $misional= "Control disipliario ";  } 

						         $retorna .= '<tr>
						         <td> '.$fila[2].' </td>
						         <td> '.$fila[3].' </td>
						         <td> '.$fila[4].' </td>
						         <td> '.$fila[11].' </td>
						         <td> '.$fila[12].' </td>
						         <td> '.$misional.' </td>
						         <td> <a class="btn btn-primary" id="editar_admin" data-id="'.$fila[0].'">Editar</a></td>';
						         if($fila[14]==1){
						         	$retorna .= '<td> <a class="btn btn-success" id="Inhabilitar_admin" data-id="'.$fila[0].'">Inhabilitar</a></td>';
						         }
						         if($fila[14]==0)
						        		{
									$retorna .= '<td> <a class="btn btn-danger" id="Habilitar_admin" data-id="'.$fila[0].'">Habilitar</a></td>';
						        		}
						         
						        $retorna .= ' </tr>';
						         
						    }
					    $resultado->close();
						}
						  $retorna .= '</tbody> </table>';

			 			return $retorna;

					}

					public function alterar_usuario_misional($editar_id,$editar_apellidos,$editar_nombre,$editar_tel_fijo,$editar_telefono_cel,$editar_direccion,$editar_email,$editar_tipo){

						
 								$retorna='';

								$conexion = $this->conexion();

								$consulta = "
								UPDATE usuario
								set
								`nombre` = '".$editar_nombre."',
								`apellidos` = '".$editar_apellidos."',
								`telefono_celular` = '".$editar_tel_fijo."',
								`telefono_fijo` = '".$editar_telefono_cel."',
								`direccion` = '".$editar_direccion."',
								`mail` = '".$editar_email."',
								`rol` = '".$editar_tipo."'
							 	 WHERE `id`='".$editar_id."'; ";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Usuario actualizado";
									} else {
									    $retorna .= "Error el usuario no fue actualzado: " . $conn->error;
									}

									$conexion->close();

					
							 	 return $retorna;
					
					}

					public function habilitar_usuario_misional($id){

						
 								$retorna='';

								$conexion = $this->conexion();

								$consulta = "
								UPDATE usuario
								set
								`estado` = 1
							 	 WHERE `id`='".$id."'; ";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Usuario inhabilitado";
									} else {
									    $retorna .= "Error el usuario no fue inhabilitado: " . $conn->error;
									}

									$conexion->close();

					
							 	 return $retorna;
					
					}

					public function inhabilitar_usuario_misional($id){

						
 								$retorna='';

								$conexion = $this->conexion();

								$consulta = "
								UPDATE usuario
								set
								`estado` = 0
							 	 WHERE `id`='".$id."'; ";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Usuario inhabilitado";
									} else {
									    $retorna .= "Error el usuario no fue inhabilitado: " . $conn->error;
									}

									$conexion->close();

					
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

					public function editar_usuario_misional($id_usuario)
					{
 								$retorna='';

								$conexion = $this->conexion();

							 	$consulta = "SELECT * FROM usuario WHERE (id = ".$id_usuario.");";

							    $arreglo = array();
                                      if ($resultado = $conexion->query($consulta)) {
                                            while($row =mysqli_fetch_assoc($resultado))
                                            {
                                                $arreglo[] = $row;
                                            }
                                          $resultado->close();
                                        }
					 return $arreglo;
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
								 		$rol=$fila[13];
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


					public function registar_usuario_misional($tipo_doc,$doc,$nom,$ape,$cel,$fij,$mail,$pais,$ciudad,$direccion,$tipo)

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

						//mail($mail,"Contraseña plataforma Fiscalia",$msg);

								


 
								$consulta = "call sp_insertar_usuario('$tipo_doc','$doc','$nom','$ape','$cel','$fij','$pais','$ciudad','$direccion','$mail','$clave','$tipo')";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Usuario Insertado";
									} else {
									    $retorna .= "Error Usuario no insertado: " . $conexion->error."$consulta ";
									}

								
							  return $retorna;

					}

					
}



?>