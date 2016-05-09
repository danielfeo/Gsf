<?php  

require('../modelo/bd.class.php'); 


class Asignador extends Db
{

	private function validar_estado($b){
						if($b==0){
						$r='images/espera.png';}
						if($b==1){
						$r='images/espera.png';
						}
						return $r;
					}

	public function listar_solicitud_asignador(){

						$retorna='';

						$conexion = $this->conexion();

						session_start();

						$id_usuario = $_SESSION['id'];

					 	$consulta = "SELECT * FROM `gestor_solicitudes`.`solicitud` where estado = 0 ";
						$retorna .= '<table id="asig_table" border="1"  cellpadding="5">
					        <thead>
					            <tr>
					                <th>Descripción</th>
					                <th>Documento</th>
					                <th>Estado</th>
					                <th>Solicitado en</th>
					                <th>Selecciona area misional</th>

					            </tr>
					        </thead>
				            <tbody><tr>';
						    
						    if ($resultado = $conexion->query($consulta)) {
						    while ($fila = $resultado->fetch_row()) {

						         $retorna .= '<td> '.$fila[2].' </td>
						         <td><a target="_blank" href="documentos/'.$fila[3].'">
						         <img height="42" src="http://icons.iconarchive.com/icons/graphicloads/filetype/128/pdf-icon.png"></a></td>
						         <td><img height="42" src="'.$this->validar_estado($fila[5]).'"></td><td>'.$fila[9].'</td>';
						         $retorna . = '
									<td>

									<option value="">...Seleccione un proceso</option>
			                        <option value="2">Atención a víctimas del delito y al ciudadano</option>
			                        <option value="3">Proteción y asistencia</option>
			                        <option value="4">Extinción del derecho de dominio</option>
			                        <option value="5">Investigación y judicialización</option>
			                        <option value="6">Justicia Transicional</option>
			                        <option value="9">Asignador de solicitudes</option>

			                        </td>

						         ';
						  		  $retorna .= '</tr>';
						    }
					    $resultado->close();
						}
						  $retorna .= '</tbody> </table>';

			 			return $retorna;

	}


}