<?php  

require('../modelo/bd.class.php'); 


class Admin extends Db
{
	private function validar_estado($b){
						if($b==0){
						$r='images/espera.png';}
						if($b==1){
						$r='images/asignado.png';
						}
						if($b==2){
						$r='images/solucion.png';
						}
						return $r;
					}


					public function respuesta_solicitud($id_solicitud,$descripcion,$filePath){
						session_start();
						$retorna='';

								$conexion = $this->conexion();

								

								$id_usuario = $_SESSION['id'];

								$consulta = "
								UPDATE solicitud
								set
								
								fecha_respuesta = '".date("Y-m-d")."',
								estado = 2 ,
								id_funcionario = $id_usuario,
								respuesta =  '$descripcion' ,
								fichero_respuesta = '$filePath'
								 WHERE id = $id_solicitud ;  ";
 								
									if ($conexion->query($consulta) === TRUE) {
									    $retorna .= "Solicitud Resuelta";
									} else {
									    $retorna .= "Error solicitud no Resuelta: " . $conexion->error;
									}

									$conexion->close();

					
							 	 return $consulta;



					}

					public function traer_dependencia(){
						session_start();

						$retorna='';

								$conexion = $this->conexion();

								

								$rol = $_SESSION['rol'];

								$consulta = "
								SELECT DISTINCT `dependencias`.`dependencia`
								FROM
								    `gestor_solicitudes`.`usuario`
								    INNER JOIN `gestor_solicitudes`.`dependencias` 
								        ON (`usuario`.`rol` = `dependencias`.`id`) WHERE `usuario`.rol = $rol; ";
 								
			 						if ($resultado = $conexion->query($consulta)) {
									    while ($fila = $resultado->fetch_row()) {

									         $retorna .= $fila[0];

									    }
								    $resultado->close();
									}
									

					
							 	 return  $retorna;



					}



					public function listar_solicitud_admin(){

						$retorna='';

						$conexion = $this->conexion();

						session_start();

						$id_usuario = $_SESSION['id'];
						$rol = $_SESSION['rol'];

					 	$consulta = "SELECT s.* , u.nombre, u.apellidos , paises.Pais , ciudades.Ciudad 
						FROM
						    solicitud s ,usuario u,`paises`, `ciudades`
						WHERE 

						s.`id_usuario` = u.id AND
						u.`fk_id_pais` = `paises`.`Codigo` AND
						u.`fk_id_ciudad` = `ciudades`.`idCiudades` and
						 s.id_asignado = $rol and s.estado = 1; ";

						$retorna .= '<table id="asig_table" border="1"  cellpadding="5">
					        <thead>
					            <tr>
					                <th>Descripción</th>
					                <th>Documento</th>
					                <th>Estado</th>
					                <th>Solicitado en</th>
					                <th>Fecha Asigación</th>
					                
					                <th>Ciudad</th>
					                <th>Solicitante</th>
					                <th>Responder</th>

					            </tr>
					        </thead>
				            <tbody>';
						    
						    if ($resultado = $conexion->query($consulta)) {
						    while ($fila = $resultado->fetch_row()) {

						         $retorna .= '<tr><td> '.$fila[2].' </td>
						         <td><a target="_blank" href="documentos/'.$fila[3].'">
						         <img height="42" src="http://icons.iconarchive.com/icons/graphicloads/filetype/128/pdf-icon.png"></a></td>
						         <td><img height="42" src="'.$this->validar_estado($fila[5]).'"></td><td>'.$fila[9].'</td>
						         <td>'.$fila[10].'</td>
						         <td>'.$fila[18].'</td>
						         <td>'.$fila[15]." ".$fila[16].'</td>';

						         $retorna .= '
									<td> <a class="btn btn-primary" id="respuesta_btn" data-id="'.$fila[0].'">Responder</a></td>

						         ';
						  		  $retorna .= '</tr>';
						    }
					    $resultado->close();
						}
						  $retorna .= '</tbody> </table>';

			 			return $retorna;

	}


		


}