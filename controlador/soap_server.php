<?php
require_once('lib/nusoap.php');
$server = new nusoap_server;

//$server ->configureWSDL('server', 'urn:server');
//$server ->wsdl->schemaTargetNamespace = 'urn:server';
//$server ->register('pollServer', array('value' => 'xsd:string'), array('return' => 'xsd:string'), 'urn:server', 'urn:server#pollServer');

//register a function that works on server
 $server->register('getInfo');

 // create age calculation function
 // create the function 
 function getInfo($cedula)
 {
  	$result['status'] = "Test goes here";
      
   	$result = array('cedula'=>$cedula);
	
	//return $result;// Return if you would like to check server response else delete this line.
	
	require('../modelo/bd.class.php'); 
	
	$DB = new Db();
	$retorna='';

	$conexion = $DB->conexion();

	$array = array();



	$consulta = "SELECT solicitud.*
FROM
    `usuario`
    INNER JOIN `solicitud` 
        ON (`usuario`.`id` = `solicitud`.`id_usuario`) WHERE `documento` = $cedula";

	if ($resultado = $conexion->query($consulta)) {
	     while($row =mysqli_fetch_assoc($resultado)){
	        $array[] = $row;

	    }
	}



  	return $array;

 }


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server ->service($HTTP_RAW_POST_DATA);
exit();
?>
